<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;

class ServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     */

     public function __construct()
     {
         $this->middleware(function ($request, $next) {
             $this->user =  Auth::user();

             return $next($request);
         });
     }

    public function index()
    {
        $data = Service::all();

        return view('back.superadmin.service.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('back.superadmin.service.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
    try {
        $validator = Validator::make($request->all(), [
            'nama' => 'required',
            'status' => 'required|in:Aktif,Nonaktif',

            'deskripsi' => 'required',
            'satuan' => 'required',
            'info' => 'required',
            'foto' => 'required|mimes:jpeg,png,jpg|max:5120'
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

            $service = new Service();
            $service->nama = $request->input('nama');
            $service->status = $request->input('status');
            $service->harga = $request->input('harga');
            $service->deskripsi = $request->input('deskripsi');
            $service->satuan = $request->input('satuan');
            $service->info = $request->input('info');
            if ($request->hasFile('foto')) {
                // Store the file and get the path
                $path = $request->file('foto')->store('service', 'public');

                $service->foto = basename($path);
            }
            $service->save();

            return redirect()->route('superadmin.service.index')->with('success', 'Data berhasil disimpan');
        } catch (ValidationException $e) {
            // Validation failed, redirect back with errors
            return redirect()->back()->withErrors($e->errors())->withInput();
        } catch (\Throwable $th) {
            // Handle any other exceptions or errors
            return back()->withErrors(['error' => 'Data gagal disimpan: ' . $th->getMessage()]);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Service $service)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $service = Service::findOrFail($id);

        return view('back.superadmin.service.edit', compact('service'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        try {
            $validator = Validator::make($request->all(), [
                'nama' => 'required',
                'status' => 'required|in:Aktif,Nonaktif',
                'harga' => 'required|numeric', // Ensure 'harga' is a number
                'deskripsi' => 'required',
                'satuan' => 'required',
                'info' => 'required',
                'foto' => 'nullable|file|image|mimes:jpeg,png,jpg|max:5120'
            ]);
            if ($validator->fails()) {
                return back()->withErrors($validator)->withInput();
            }

            $service = Service::findOrFail($id);
            $service->nama = $request->input('nama');
            $service->status = $request->input('status');
            $service->harga = $request->input('harga');
            $service->deskripsi = $request->input('deskripsi');
            $service->satuan = $request->input('satuan');
            $service->info = $request->input('info');
            if ($request->hasFile('foto')) {
                if ($service->foto) {
                    Storage::disk('public')->delete('service/' . $service->foto);
                }

                // Store the new photo in the 'public/service' directory
                $path = $request->file('foto')->store('service', 'public');

                // Save the filename without the path
                $service->foto = basename($path);
            }

            $service->save();

            return redirect()->route('superadmin.service.index')->with('success', 'Data berhasil diubah');
        } catch (\Throwable $th) {
            return back()->withErrors('Data gagal disimpan');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        try {
            $service = Service::findOrFail($id);

            // Check if the service has a foto and delete it
            if (!is_null($service->foto)) {
                Storage::delete('service/' . $service->foto);
            }

            $service->delete();

            return redirect()->route('superadmin.service.index')->with('success', 'Jenis Pelayanan Berhasil Dihapus');
        } catch (\Throwable $th) {
            return back()->withErrors('Jenis Pelayanan Gagal Dihapus');
        }
    }
}
