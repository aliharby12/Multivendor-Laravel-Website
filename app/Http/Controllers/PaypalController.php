<?php

namespace App\Http\Controllers;

use Darryldecode\Cart\Cart;
use Illuminate\Http\Request;
use Srmklive\PayPal\Services\ExpressCheckout;

class PaypalController extends Controller
{
    public function getExpressCheckout()
    {
        // we will use array_map to return qty insted of quantity
        $cartItems = array_map(function ($item) {
            return [
                'name' => $item['name'],
                'price' => $item['price'],
                'qty' => $item['quantity'],
            ];
        }, \Cart::getcontent()->toarray());

        // dd($cartItems);

        $checkoutData = [
            'items' => $cartItems,
            'return_url' => route('paypal.success'),
            'cancel_url' => route('paypal.cancel'),
            'invoice_id' => uniqid(),
            'invoice_description' => 'Order Description',
            'total' => \Cart::getTotal()
        ];

        $provider = new ExpressCheckout();

        $respone = $provider->setExpressCheckout($checkoutData);

        return redirect($respone['paypal_link']);
    }

    public function getExpressCheckoutCancel()
    {
        # code...
    }
}
