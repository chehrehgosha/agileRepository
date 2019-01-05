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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/seed', 'HomeController@seed')->name('seed');

Route::get('/user/verify/{token}', 'Auth\RegisterController@verifyUser');

Route::get('/products', 'ProductController@index')->name('products');
Route::get('/products/{product_id}','ProductController@item')->where('product_id', '[0-9]')->name('product');
Route::any('/products/add','ProductController@add')->name('add_product');

Route::get('/auctions', 'HomeController@auctions')->name('auctions');
Route::get('/auctions/{auction_id}','HomeController@auction')->where('auction_id', '[0-9]')->name('auction');






Route::get('/profile','HomeController@auction')->name('auction');
Route::post('/profile','HomeController@auction')->name('auction');

Route::get('/profile/charge','HomeController@auction')->name('charge');
Route::get('/profile/edit_product','HomeController@auction')->name('edit_product');
Route::get('/profile/add_auction','HomeController@auction')->name('add_auction');
Route::get('/profile/edit_auction','HomeController@auction')->name('edit_auction');

Route::post('/profile/charge','HomeController@auction');
Route::post('/profile/add_product','HomeController@auction');
Route::post('/profile/edit_product','HomeController@auction');
Route::post('/profile/add_auction','HomeController@auction');
Route::post('/profile/edit_auction','HomeController@auction');

Route::get('/profile/log','HomeController@auction')->name('log');
Route::get('/profile/accept/{id}','HomeController@auction')->name('accept');
Route::get('/profile/decline/{id}','HomeController@auction')->name('decline');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
