<?php

namespace App\Http\Controllers;

use App\Models\Service;
use App\Models\Tagihan;
use App\Models\Permohonan;
use App\Models\Pembayaran;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BackController extends Controller
{
    public function adminindex()
    {
        return view('back.admin.index');
    }

    public function superindex()
    {

        $data = Service::all();

        return view('back.superadmin.index', compact('data'));
    }

    public function supergraphic()
    {

        $data = Service::all();

        return view('back.superadmin.grafik', compact('data'));
    }

    public function index()
    {

$permohonan = Permohonan::whereUserId(Auth::user()->id)->get();


$getid = Permohonan::whereUserId(Auth::user()->id)->first();

$jumlah = 0;
$total = 0;


if ($getid) {
    $tagihan = Tagihan::where('permohonan_id', $getid->id)
        ->where(function ($query) {
            $query->whereNotIn('verifikasi', ['diterima'])
                  ->orWhereNull('verifikasi');
        })
        ->get();


    if ($tagihan->isNotEmpty()) {
        $jumlah = $tagihan->count();
        $total = $tagihan->sum('total');
    }
}


return view('back.user.index', compact('permohonan', 'jumlah', 'total'));



        return view('back.user.index', compact('permohonan', 'jumlah', 'total'));
    }
}
