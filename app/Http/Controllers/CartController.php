<?php

namespace App\Http\Controllers;


use App\Product;
use Darryldecode\Cart\Cart;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function add(Product $product)
    {
        \Cart::add(array(
            'id' => $product->id,
            'name' => $product->name,
            'price' => $product->price,
            'quantity' => 1,
            'attributes' => array(),
            'associatedModel' => $product
        ));

        return redirect()->route('cart.index');
    }

    public function index()
    {
        $cartItems = \Cart::getcontent();
        return view('cart.index', compact('cartItems'));
    }

    public function destroy($itemId)
    {
        \Cart::remove($itemId);
        return back();
    }

    public function update($itemId)
    {
        \Cart::update($itemId, [
            'quantity' => array(
                'relative' => false,
                'value' => request('quantity')
            )
        ]);

        return back();
    }

    public function checkout()
    {
        return view('cart.checkout');
    }
}
