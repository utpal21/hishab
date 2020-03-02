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

// Route::get('/home', 'HomeController@index')->name('home');
// Auth::routes();
// Route::get('/home', 'HomeController@index')->name('home');

Route::get('/home', 'HomeController@index')->name('home')->middleware('auth');
Route::resource('products','ProductController')->middleware('auth');
Route::resource('agents','AgentController')->middleware('auth');
Route::resource('customers','CustomerController')->middleware('auth');
Route::resource('accounts','AccountController')->middleware('auth');
Route::resource('billings','BillingController')->middleware('auth');

