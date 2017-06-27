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

Route::get('/contact', 'ContactsController@index')->name('contact');
Route::get('/create', 'ContactsController@create')->name('create');
Route::post('/store', 'ContactsController@store')->name('store');
