<?php

namespace App\Http\Controllers;
use App\Product;
use Darryldecode\Cart\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

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

        Session::flash('success', 'product added successfully');
        return back();
    }

    public function index()
    {
        $cartItems = \Cart::getcontent();
        return view('cart.index', compact('cartItems'));
    }

    public function destroy($itemId)
    {
        \Cart::remove($itemId);
        Session::flash('success', 'product has been deleted successfully');
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

        Session::flash('success', 'your cart updated successfully');
        return back();
    }

    public function checkout()
    {
        return view('cart.checkout');
    }
}
