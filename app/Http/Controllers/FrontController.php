<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FrontController extends Controller
{
    public function home()
    {
        return view('front.index');
    }

    public function about()
    {
        return view('front.about');
    }

    public function reservation()
    {
        return view('front.reservation');
    }

    public function login()
    {
        return view('front.login');
    }
}
