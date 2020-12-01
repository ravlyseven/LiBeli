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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::resource('updates', 'UpdatesController');
Route::resource('events', 'EventsController');
Route::resource('products', 'ProductsController');

Route::get('/profiles', 'UsersController@show');
Route::post('/profile', 'UsersController@update');
Route::post('/profile_password', 'UsersController@update_password');

Route::get('orders', 'OrdersController@index');
Route::post('orders/{id}', 'OrdersController@pesan');
Route::delete('orders/{id}', 'OrdersController@delete');
Route::get('checkout', 'OrdersController@checkout');


Route::get('carts', 'CartsController@index');



Route::group(['middleware' => ['auth', 'auth.admin']], function () {
    Route::get('/dashboard', 'HomeController@dashboard');
});



// Route::group(['middleware' => ['auth', 'auth.penjual']], function () {
// });
