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

Route::group(['prefix' => 'users', 'middleware' => ['auth']], function () {
    Route::get('/', 'UserController@index')->name('users');
    Route::get('/create', 'UserController@create')->name('users/create');
    Route::post('/save', 'UserController@store')->name('users/save');
    Route::get('/edit/{id}', 'UserController@edit')->name('users/edit');
    Route::get('/delete/{id}', 'UserController@destroy')->name('users/delete');
    Route::post('/update/{id}', 'UserController@update')->name('users/update');
});

Route::group(['prefix' => 'cities', 'middleware' => ['auth']], function () {
    Route::get('/', 'CityController@index')->name('cities');
    Route::get('/create', 'CityController@create')->name('cities/create');
    Route::post('/save', 'CityController@store')->name('cities/save');
    Route::get('/edit/{id}', 'CityController@edit')->name('cities/edit');
    Route::get('/delete/{id}', 'CityController@destroy')->name('cities/delete');
    Route::post('/update/{id}', 'CityController@update')->name('cities/update');
});

Route::group(['prefix' => 'clients', 'middleware' => ['auth']], function () {
    Route::get('/', 'ClientController@index')->name('clients');
    Route::get('/create', 'ClientController@create')->name('clients/create');
    Route::post('/save', 'ClientController@store')->name('clients/save');
    Route::get('/edit/{id}', 'ClientController@edit')->name('clients/edit');
    Route::get('/delete/{id}', 'ClientController@destroy')->name('clients/delete');
    Route::post('/update/{id}', 'ClientController@update')->name('clients/update');
});
