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

    public function index()
    {
        $permohonan = Permohonan::whereUserId(Auth::user()->id)->get();
        $getid = Permohonan::whereUserId(Auth::user()->id)->first();
        $tagihan = Tagihan::where('permohonan_id', $getid->id)->where(function ($query) {
                      $query->whereNotIn('verifikasi', ['diterima'])->orWhereNull('verifikasi');
                  })
                  ->get();
        $jumlah = $tagihan->count();
        $total = $tagihan->sum('total');
        // dd($tagihan);
        // $tagihan = Tagihan::wherePermohonanId($getid->id)->where(function($query) {
        //         $query->whereStatusPembayaran(null)->orWhere('verifikasi', 'bukti tidak valid');})->count();

        // $lunas = Tagihan::wherePermohonanId($getid->id)->whereVerifikasi('diterima')->count();

        return view('back.user.index', compact('permohonan', 'jumlah', 'total'));
    }
}
