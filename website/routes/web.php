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

// default homepage
Route::get('/', function () {
    return view('pages.homepage');
});

// my homepage
Route::get('/home', function () {
    return view('layouts.master');
});