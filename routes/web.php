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
Route::get('/dashboard', 'HomeController@dashboard');

// Route::get('/updates', 'UpdatesController@index');
// Route::get('/updates/create', 'UpdatesController@create');
// Route::post('/updates', 'UpdatesController@store');
Route::resource('updates', 'UpdatesController');
// Route::delete('/updates/{update}', 'UpdatesController@destroy');

Route::get('/profiles', 'MainController@show');

