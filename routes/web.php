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
    return view('auth.login');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/cities', 'CityController@index')->name('cities');
Route::get('/clients', 'ClientController@index')->name('clients');
Route::get('/users', 'UserController@index')->name('users');
Route::post('/user/create', 'UserController@create')->name('user/create');
