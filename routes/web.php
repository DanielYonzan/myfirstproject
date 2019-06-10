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

//Route::get('/', function () {
//    return view('dashboard');
//});

Auth::routes();

Route::get('/dashboard', 'DashboardController@index')->name('dashboard');

Route::get('/', 'FrontController@index')->name('front.index');
Route::get('/details/{id}', 'FrontController@detail')->name('product.details');

Route::resource('category', 'CategoryController');
Route::resource('products', 'ProductController');
Route::resource('tag', 'TagController');


