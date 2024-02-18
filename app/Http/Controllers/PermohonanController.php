<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Service;
use App\Models\User;
use App\Models\Permohonan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;

class PermohonanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Permohonan::all();
        foreach ($data as $item) {
            $item->statuspelayanan = $item->isActive == 1 ? 'aktif' : 'deactive';
        }

        return view('back.superadmin.permohonan.index', compact('data'));
    }

    public function adminIndex()
    {
        //
    }

    public function userIndex()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $service = Service::all();
        $user = User::whereRole('user')->get();
        // dd($service);
        return view('back.superadmin.permohonan.create', compact('service', 'user'));
    }

    public function userCreate()
    {
        if (is_null(Auth::user()->profil)) {
            return redirect()->route('user.profile.profile')->with('warning', 'Anda Harus Mengisi Profil Terlebih Dahulu');
        } else {
            $service = Service::all();
            // dd($service);
            return view('back.user.permohonan.create', compact('service'));
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            $validator = Validator::make($request->all(), [
                'nama_pjb' => 'required',
                'user_id' => 'required',
                'user_id' => 'required',
                'tipe_permohonan' => 'required',
                'service_id' => 'required|array',
                'service_id.*' => 'exists:services,id',
                'dokumen' => 'nullable',
            ]);

            if ($validator->fails()) {
                return back()
                    ->withErrors($validator)
                    ->withInput();
            }

            $permohonan = new Permohonan();
            $permohonan->nama_pjb = $request->input('nama_pjb');
            $permohonan->user_id = $request->input('user_id');
            $permohonan->status = $request->input('status');
            $permohonan->tipe_permohonan = $request->input('tipe_permohonan');
            if ($request->hasFile('dokumen')) {
                // Store the file and get the path
                $path = $request->file('dokumen')->store('dokumen', 'public');

                $permohonan->dokumen = basename($path);
            }

            $permohonan->save();

            $permohonan->services()->attach($request->input('service_id'));

            return redirect()->route('superadmin.permohonan.index')->with('success', 'Berhasil mengajukan permohonan');
        }catch (ValidationException $e) {
            // Validation failed, redirect back with errors
            return redirect()->back()->withErrors($e->errors())->withInput();
        }

    }

    public function adminStore(Request $request)
    {
        //
    }

    public function userStore(Request $request)
    {
        try {
            $validator = Validator::make($request->all(), [
                'nama_pjb' => 'required',
                'service_id' => 'required|array',
                'service_id.*' => 'exists:services,id',
                'dokumen' => 'nullable',
            ]);

            if ($validator->fails()) {
                return back()
                    ->withErrors($validator)
                    ->withInput();
            }

            $permohonan = new Permohonan();
            $permohonan->nama_pjb = $request->input('nama_pjb');
            $permohonan->user_id = Auth::user()->id;
            $permohonan->status = 'pending';
            $permohonan->tipe_permohonan = 'baru';
            if ($request->hasFile('dokumen')) {
                // Store the file and get the path
                $path = $request->file('dokumen')->store('dokumen', 'public');

                $permohonan->dokumen = basename($path);
            }

            $permohonan->save();

            $permohonan->services()->attach($request->input('service_id'));

            return redirect()->route('user.index')->with('success', 'Berhasil mengajukan permohonan');
        }catch (ValidationException $e) {
            // Validation failed, redirect back with errors
            return redirect()->back()->withErrors($e->errors())->withInput();
        }
}

    /**
     * Display the specified resource.
     */
    public function show(Permohonan $permohonan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $data = Permohonan::findOrFail($id);
        $service = Service::all();
        $user = User::whereRole('user')->get();

        return view('back.superadmin.permohonan.edit', compact('data', 'service', 'user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        try {
            $validator = Validator::make($request->all(), [
                'nama_pjb' => 'required',
                'user_id' => 'required',
                'user_id' => 'required',
                'tgl_awal' => 'nullable',
                'isActive' => 'required',
                'tgl_berakhir' => 'nullable',
                'tipe_permohonan' => 'required',
                'service_id' => 'required|array',
                'service_id.*' => 'exists:services,id',
                'dokumen' => 'nullable',
                'no_surat' => 'nullable',
            ]);

            if ($validator->fails()) {
                return back()
                    ->withErrors($validator)
                    ->withInput();
            }

            $permohonan = Permohonan::findOrFail($id);
            $permohonan->nama_pjb = $request->input('nama_pjb');
            $permohonan->no_surat = $request->input('no_surat');
            $permohonan->user_id = $request->input('user_id');
            $permohonan->status = $request->input('status');
            $permohonan->tgl_awal = $request->input('tgl_awal');
            $permohonan->tgl_berakhir = $request->input('tgl_berakhir');
            $permohonan->isActive = $request->input('isActive');
            $permohonan->tipe_permohonan = $request->input('tipe_permohonan');

            if ($request->hasFile('dokumen') && $permohonan->dokumen) {
                Storage::disk('public')->delete('dokumen/' . $permohonan->dokumen);
            }

            if ($request->hasFile('dokumen')) {
                $path = $request->file('dokumen')->store('dokumen', 'public');
                $permohonan->dokumen = basename($path);
            }

            $permohonan->save();

            $permohonan->services()->sync($request->input('service_id'));

            return redirect()->route('superadmin.permohonan.index')->with('success', 'Berhasil mengubah permohonan');
        }catch (ValidationException $e) {
            // Validation failed, redirect back with errors
            return redirect()->back()->withErrors($e->errors())->withInput();
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request, $id)
    {
        try {
            $permohonan = Permohonan::findOrFail($id);

            $permohonan->services()->detach();

            $permohonan->delete();

            return redirect()->route('superadmin.permohonan.index')->with('success', 'Permohonan berhasil dihapus.');
        } catch (\Throwable $th) {
            return back()->withErrors('User gagal dihapus');
        }
    }
}
