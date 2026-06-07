<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        return view('frontend.home.index');
    }

    public function about_us()
    {
        return view('frontend.home.about');
    }
    
    public function gallery()
    {
        return view('frontend.home.gallery');
    }
    
    public function contact()
    {
        return view('frontend.home.contact');
    }
}