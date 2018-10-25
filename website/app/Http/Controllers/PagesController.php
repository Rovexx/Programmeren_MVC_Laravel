<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    // Redirect non-logged in users to login except for..
    public function __construct()
    {
        $this->middleware('auth')->except('index');
    }

    /**
     * Show the homepage.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('pages.homepage');
    }

    // show routes page
    public function route(){
        return view('pages.route');
    }
    // show contact page
    public function contact(){
        return view('pages.contact');
    }
}
