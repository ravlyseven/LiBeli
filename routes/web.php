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

Route::get('/profiles', 'UsersController@show');
Route::post('/profile', 'UsersController@update');
Route::post('/profile_password', 'UsersController@update_password');



Route::group(['middleware' => ['auth', 'auth.admin']], function () {
    Route::get('/dashboard', 'HomeController@dashboard');
});


Route::resource('products', 'ProductsController');

// Route::group(['middleware' => ['auth', 'auth.penjual']], function () {
// });
