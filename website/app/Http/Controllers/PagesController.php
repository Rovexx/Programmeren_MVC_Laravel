<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function homepage(){
        return view('pages.homepage');
    }

    public function occasion(){
        return view('pages.occasion');
    }

    public function addCar(){
        return view('pages.addCar');
    }

    public function route(){
        return view('pages.route');
    }

    public function contact(){
        return view('pages.contact');
    }
}
