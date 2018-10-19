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
// view occasion page
Route::get('/occasion', 'PagesController@occasion');
// add new car page
Route::get('/addCar', 'PagesController@addCar');
// route page
Route::get('/route', 'PagesController@route');
// contact page
Route::get('/contact', 'PagesController@contact');

Route::resource('occasions', 'OccasionsController');