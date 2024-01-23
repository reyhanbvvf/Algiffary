<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BackController extends Controller
{
    public function adminindex()
    {
        return view('back.admin.index');
    }

    public function superindex()
    {
        return view('back.superadmin.index');
    }

    public function index()
    {
        return view('back.user.index');
    }
}
