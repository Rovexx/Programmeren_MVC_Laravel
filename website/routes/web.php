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
Route::get('/', 'PagesController@home');
// Homepage
Route::get('/home', 'PagesController@home');
// Route page
Route::get('/route', 'PagesController@route');
// Contact page
Route::get('/contact', 'PagesController@contact');

// Automatic routes for resources
Route::resource('occasions', 'OccasionsController');
// Post route for filtering occasions
Route::post('/occasions/search', 'OccasionsController@index');
// Route to change occasion status function admin
Route::post('/occasions/changeStatus', 'OccasionsController@changeStatus');

// Routes for the login system
Auth::routes();

