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

Route::get('/', 'MainController@index');
Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();


Route::resource('updates', 'UpdatesController');
Route::resource('events', 'EventsController');
Route::resource('products', 'ProductsController');

Route::get('/profile', 'UsersController@show');
Route::post('/profile', 'UsersController@update');
Route::post('/profile_password', 'UsersController@update_password');

Route::get('profile/{id}', 'ProfilesController@toko');


Route::get('orders', 'OrdersController@index');
Route::post('orders/{id}', 'OrdersController@pesan');
Route::delete('orders/{id}', 'OrdersController@delete');
Route::get('checkout', 'OrdersController@checkout');

Route::get('history', 'HistoryController@index');
Route::get('history/{id}', 'HistoryController@show');
Route::delete('history/{id}', 'HistoryController@delete');
Route::get('history/{id}/info', 'HistoryController@info');
Route::post('history/{id}', 'HistoryController@update');
Route::post('history/{id}/verifikasi-pembayaran', 'HistoryController@verifikasi');
Route::post('history/{id}/verifikasi-pengiriman', 'HistoryController@pengiriman');
Route::post('history/{id}/verifikasi-selesai', 'HistoryController@selesai');

Route::get('chats', 'ChatsController@index');
Route::get('chats/{id}', 'ChatsController@show');
Route::post('chats/{id}', 'ChatsController@send');




Route::group(['middleware' => ['auth', 'auth.admin']], function () {
    Route::get('/dashboard', 'HomeController@dashboard');
});



// Route::group(['middleware' => ['auth', 'auth.penjual']], function () {
// });
