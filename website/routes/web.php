<?php

// Web pages
Route::get('/', 'PagesController@home');
Route::get('/home', 'PagesController@home');
Route::get('/route', 'PagesController@route');
Route::get('/contact', 'PagesController@contact');

// Automatic routes for resources
Route::resource('occasions', 'OccasionsController');
// Post route for filtering occasions
Route::post('/occasions/search', 'OccasionsController@index');
// Route to change occasion status function admin
Route::post('/occasions/changeStatus', 'OccasionsController@changeStatus');

// Route to add occasion listing to favorites as logged in user
Route::post('/occasions/favorite', 'UsersController@favorite');
// Routes for user dashboard
Route::get('/dashboard', 'UsersController@index');
// Routes for changing user dashboard settings
Route::put('/dashboard/update', 'UsersController@update');

// Routes for the login system
Auth::routes();