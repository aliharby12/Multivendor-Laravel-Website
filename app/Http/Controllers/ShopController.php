<?php

namespace App\Http\Controllers;

use App\Shop;
use App\User;
use Illuminate\Http\Request;
use App\Mail\ShopMailActivation;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;

class ShopController extends Controller
{

    public function index()
    {
        //
    } // end of index


    public function create()
    {

        return view('shops.create');

    } // end of create


    public function store(Request $request)
    {

        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'phone' => 'required',

        ]);

        // save data to database
        $shop = auth()->user()->shops()->create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'phone' => $request->input('phone'),
            'description' => $request->input('description'),
        ]);

        // send flash message
        session::flash('success', 'your data has been sent successfully');
        return redirect()->route('home');
    } // end of store


    public function show(Shop $shop)
    {
        //
    } // end of show


    public function edit(Shop $shop)
    {
        //
    } // end of edit


    public function update(Request $request, Shop $shop)
    {
        //
    } // end of update


    public function destroy(Shop $shop)
    {
        //
    } // end of destroy
}
