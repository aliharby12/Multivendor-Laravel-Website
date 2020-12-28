<?php

namespace App\Http\Controllers;

use App\Order;
use Darryldecode\Cart\Cart;
use Illuminate\Http\Request;

class OrderController extends Controller
{

    public function index()
    {
        //
    } // end of index


    public function create()
    {
        //
    } //end of create


    public function store(Request $request)
    {
        $request->validate([
            'shipping_fullname' => 'required',
            'shipping_state' => 'required',
            'shipping_city' => 'required',
            'shipping_address' => 'required',
            'shipping_phone' => 'required',
            'payment_method' => 'required'
        ]);

        $order = new Order();

        $order->order_number = uniqid('OrderNumber-');
        $order->shipping_fullname = $request->input('shipping_fullname');
        $order->shipping_state = $request->input('shipping_state');
        $order->shipping_city = $request->input('shipping_city');
        $order->shipping_address = $request->input('shipping_address');
        $order->shipping_phone = $request->input('shipping_phone');
        $order->shipping_zipcode = $request->input('shipping_zipcode');

        if (!$request->has('billing_fullname')) {
            $order->billing_fullname = $request->input('shipping_fullname');
            $order->billing_state = $request->input('shipping_state');
            $order->billing_city = $request->input('shipping_city');
            $order->billing_address = $request->input('shipping_address');
            $order->billing_phone = $request->input('shipping_phone');
            $order->billing_zipcode = $request->input('shipping_zipcode');
        } else {
            $order->billing_fullname = $request->input('billing_fullname');
            $order->billing_state = $request->input('billing_state');
            $order->billing_city = $request->input('billing_city');
            $order->billing_address = $request->input('billing_address');
            $order->billing_phone = $request->input('billing_phone');
            $order->billing_zipcode = $request->input('billing_zipcode');
        }

        $order->total = \Cart::getTotal();
        $order->item_count = \Cart::getContent()->count();

        $order->save();

        // save the order items
        $orderItems = \Cart::getContent();
        foreach ($orderItems as $item) {
            $order->items()->attach($item->id, ['price' => $item->price, 'quantity' => $item->quantity]);
        }

        //payment method
        if (request('payment_method') == 'paypal') {
            // redirect to paypal sdk
        }

        // clear the cart
        \Cart::clear();

        return "done";
    } //end of store


    public function show(Order $order)
    {
        //
    } //end of show


    public function edit(Order $order)
    {
        //
    } //end of edit


    public function update(Request $request, Order $order)
    {
        //
    } // end of update


    public function destroy(Order $order)
    {
        //
    } // end of destroy
}
