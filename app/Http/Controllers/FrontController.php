<?php

namespace App\Http\Controllers;

use App\Models\Service;
use Illuminate\Http\Request;

class FrontController extends Controller
{
    public function home()
    {
        $data = Service::all();
        return view('front.index', compact('data'));
    }

    public function about()
    {
        return view('front.about');
    }

    public function reservation()
    {
        return view('front.reservation');
    }

}
