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

Route::get('/', 'StaticPagesController@home')->name('home');

Route::get('search', 'SearchEntityController@simple')->name('search.simple');
Route::get('search/{keyword}', 'SearchEntityController@result')->name('search.result');
Route::get('advance', 'SearchEntityController@advance')->name('search.advance');
Route::get('advance/results', 'SearchEntityController@results')->name('advance.results');

Route::resource('users', 'UsersController');
Route::get('signup', 'UsersController@create')->name('signup');

Route::get('login', 'SessionsController@create')->name('login');
Route::post('login', 'SessionsController@store')->name('login');
Route::delete('logout', 'SessionsController@destroy')->name('logout');


