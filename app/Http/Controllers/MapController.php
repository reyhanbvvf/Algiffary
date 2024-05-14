<?php

namespace App\Http\Controllers;

use App\Models\Profil;
use Illuminate\Http\Request;

class MapController extends Controller
{
    public function index()
    {
        $data = Profil::all();

        return view('back.superadmin.map.index', compact('data'));
    }
}
