<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Service;
use App\Models\Tagihan;
use App\Models\Permohonan;
use App\Models\Pembayaran;
use Illuminate\Support\Facades\Log;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;

class TagihanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index($id)
    {
    try {
        $permohonan = Permohonan::findOrFail($id);

        $data = $permohonan->tagihan;
        // dd($data);
        return view('back.superadmin.tagihan.index', compact('data', 'permohonan'));
        } catch (\Exception $e) {

            return back()->withError('Permohonan Tidak Ditemukan');
            // return view('error')->with('error', $e->getMessage());
        }
    }

    public function indexUser()
    {
        try{
            $permohonan = Permohonan::whereUserId(Auth::user()->id)->first();
            $data = Tagihan::where('permohonan_id', $permohonan->id)->where(function($query) {
                    $query->where('status_pembayaran', null)->orWhere('status_pembayaran', 'bukti tidak valid');})->get();
            // dd($data);
            return view('back.user.tagihan.index', compact('data'));
        } catch (\Exception $e) {

            return back()->withError('Anda Tidak Mempunyai Tagihan yang Harus Dibayar');
            return view('error')->with('error', $e->getMessage());
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create($id)
    {
        $data = Permohonan::findOrFail($id);

        return view('back.superadmin.tagihan.create', compact('data'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request->all());

        $validator = Validator::make($request->all(), [
            'bayar_awal' => 'required|date',
            'bayar_berakhir' => 'required|date|after_or_equal:bayar_awal',
            'harga.*' => 'required|numeric|min:0',
            'jumlah.*' => 'required|integer|min:1',
        ]);

        if ($validator->fails()) {
            return back()
                ->withErrors($validator)
                ->withInput();
        }

        try {
            DB::beginTransaction();
            $tagihan = new Tagihan();
            $tagihan->permohonan_id = $request->permohonan_id;
            $tagihan->bayar_awal = $request->input('bayar_awal');
            $tagihan->bayar_berakhir = $request->input('bayar_berakhir');
            $tagihan->save();

            $services = Permohonan::findOrFail($request->permohonan_id)->services()->pluck('id')->toArray();

            $total = 0; // Inisialisasi total pembayaran

            foreach ($services as $index => $service_id) {
                $harga = $request->input('harga')[$index];
                $jumlah = $request->input('jumlah')[$index];
                $subtotal = $harga * $jumlah;

                $pembayaran = new Pembayaran();
                $pembayaran->tagihan_id = $tagihan->id;
                $pembayaran->service_id = $service_id;
                $pembayaran->harga = $harga;
                $pembayaran->jumlah = $jumlah;
                $pembayaran->subtotal = $subtotal;
                $pembayaran->save();

                $total += $subtotal; // Menambahkan subtotal ke total pembayaran
            }

            $tagihan->total = $total;
            $tagihan->save();

            DB::commit();
            return redirect()->route('superadmin.tagihan.index', $tagihan->permohonan_id)->with('success', 'Berhasil menambahkan tagihan');
        } catch (\Exception $e) {
            DB::rollback();
            return redirect()->back()->withErrors([$e->getMessage()])->withInput();

        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Tagihan $tagihan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        //
    }

    public function editUser($id)
    {
        try{
            $data = Tagihan::findOrFail($id);

            return view('back.user.tagihan.edit', compact('data'));
        } catch (\Exception $e) {

            return back()->withError('Permohonan Tidak Ditemukan');
            // return view('error')->with('error', $e->getMessage());
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        //
    }

    public function updateBukti(Request $request, $id)
    {
        try{


            } catch (\Exception $e) {

            return back()->withError('Gagal upload bukti, mohon periksa kembali file anda');
            // return view('error')->with('error', $e->getMessage());
            }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        try {
            $tagihan = Tagihan::findOrFail($id);

            $tagihan->pembayaran()->detach();

            $tagihan->delete();

            return redirect()->route('user.tagihan.index')->with('success', 'Tagihan berhasil dihapus.');
        } catch (\Throwable $th) {
            return back()->withErrors('Tagihan gagal dihapus');
        }
    }
}
