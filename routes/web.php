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

Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');

Route::resource('users', 'UserController');

Route::get('profile/{name}', 'UserController@show');
Route::get('/{name}', 'UserController@show');

Route::get('/', 'UserController@index');
Route::resource('stops', 'StopController');
Route::resource('posts', 'PostController');









