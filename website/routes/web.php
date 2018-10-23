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

// Homepage
Route::get('/', 'PagesController@homepage');
// Route page
Route::get('/route', 'PagesController@route');
// Contact page
Route::get('/contact', 'PagesController@contact');

// Automatic routes for resources
Route::resource('occasions', 'OccasionsController');

// Routes for the login system
Auth::routes();
// Homepage as logged in user
Route::get('/home', 'HomeController@index')->name('home');
