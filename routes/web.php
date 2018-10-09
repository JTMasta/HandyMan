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

Route::get('/', 'HomeController@home');

Route::get('/services', 'ServicesController@index');
Route::get('/services/create', 'ServicesController@create');
Route::post('/services', 'ServicesController@store');
Route::get('/services/{service}', 'ServicesController@show');
Route::get('/services/{service}/edit', 'ServicesController@edit');
Route::patch('/services/{service}', 'ServicesController@update');
Route::delete('/services/{service}', 'ServicesController@delete');

Route::get('/register', ['uses' => 'RegistrationController@create'])->name('register');
Route::get('/register/handyman', 'RegistrationController@createHandyMan');
Route::post('/register', 'RegistrationController@store');


Route::get('/login', 'SessionsController@create');
Route::post('/login', 'SessionsController@store');
Route::get('/logout', 'SessionsController@destroy');
