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

// homepage
Route::get('/', 'PagesController@homepage');
// route page
Route::get('/route', 'PagesController@route');
// contact page
Route::get('/contact', 'PagesController@contact');

// automatic routes for resources
Route::resource('occasions', 'OccasionsController');
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
