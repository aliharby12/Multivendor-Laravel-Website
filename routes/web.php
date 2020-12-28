<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::redirect('/', '/home');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

// cart routes
Route::get('/add-to-cart/{product}', 'CartController@add')->name('cart.add');
Route::get('/cart', 'CartController@index')->name('cart.index');
Route::get('/cart/destroy/{itemId}/', 'CartController@destroy')->name('cart.destroy');
Route::get('/cart/update/{itemId}/', 'CartController@update')->name('cart.update');
Route::get('/cart/checkout/', 'CartController@checkout')->name('cart.checkout');

// order routes
Route::resource('order', 'OrderController');


// paypal routes
Route::get('paypal/checkout', 'PaypalController@getExpressCheckout');
Route::get('paypal/checkout-success', 'PaypalController@getExpressCheckoutSuccess')->name('paypal.success');
Route::get('paypal/checkout-cancel', 'PaypalController@getExpressCheckoutCancel')->name('paypal.cancel');


Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
});
