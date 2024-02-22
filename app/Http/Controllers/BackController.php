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
        return view('back.superadmin.index');
    }

    public function index()
    {
        $permohonan = Permohonan::whereUserId(Auth::user()->id)->get();
        $getid = Permohonan::whereUserId(Auth::user()->id)->first();
        $tagihan = Tagihan::wherePermohonanId($getid->id)->where(function($query) {
                $query->whereStatusPembayaran(null)->orWhere('verifikasi', 'bukti tidak valid');})->count();

        $lunas = Tagihan::wherePermohonanId($getid->id)->whereVerifikasi('diterima')->count();

        return view('back.user.index', compact('permohonan', 'tagihan', 'lunas'));
    }
}
