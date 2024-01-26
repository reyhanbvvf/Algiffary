<?php

namespace App\Http\Controllers;

use App\Models\Service;
use Illuminate\Http\Request;

class BackController extends Controller
{
    public function adminindex()
    {
        $data = Service::all();

        return view('back.admin.index', compact('data'));
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
