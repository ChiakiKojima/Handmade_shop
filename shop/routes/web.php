<?php

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


Route::get('/', 'ItemsController@index')->name('home');
Route::post('/', 'CartController@makeCartEmpty');
Route::post('/send', 'ContactsController@sendMail');
Route::post('/order_complete', 'CartController@orderAcceptMail');

Route::post('contact_confirm', 'ContactsController@contactConfirm')->name('contactConfirm');
Route::get('contact', 'ContactsController@contact')->name('contact');



Route::get('mypage','PagesController@mypage')->name('mypage');
Route::get('about','PagesController@about')->name('about');
Route::get('edit', 'PagesController@edit')->name('edit');  
Route::patch('mypage', 'PagesController@update')->name('update');


Route::get('items/{id}', 'ItemsController@show')->name('items.show');
//Route::get('items/{id}', 'ItemsController@orderValidation')->name('orderValidation');


Auth::routes();

Route::get('/dashboard', 'DashboardController@index')->name('dashboard');

Route::get('cart/delete', 'CartController@deleteCartItem');

Route::post('cart', 'CartController@getOrders')->name('getOrders');
Route::get('cart', 'CartController@navToCart')->name('navToCart');

Route::post('delivery', 'CartController@delivery')->name('delivery'); 
Route::get('delivery', 'CartController@redirect'); 

Route::post('payment', 'CartController@payment')->name('payment'); 
Route::get('payment', 'CartController@redirectPayment');

Route::post('order_confirm', 'CartController@orderConfirm')->name('confirm');

