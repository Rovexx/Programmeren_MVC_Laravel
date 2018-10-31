<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller
{
    // Show homepage
    public function home()
    {
        return view('pages.homepage');
    }
    // Show routes page
    public function route(){
        return view('pages.route');
    }
    // Show contact page
    public function contact(){
        return view('pages.contact');
    }
}
