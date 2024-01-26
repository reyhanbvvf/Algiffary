<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;

class UserController extends Controller
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
        $data = User::all();

        return view('back.superadmin.user.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('back.superadmin.user.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
    try {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'role' => 'required|in:superadmin,admin,user',
            'email' => 'required|email|unique:users,email,' . $id,
            'username' => 'required|unique:users,username,' . $id,
            'password' => 'required|confirmed|min:8',
        ]);

        if ($validator->fails()) {
            return back()
                ->withErrors($validator)
                ->withInput();
        }

            $user = new User();
            $user->name = $request->input('name');
            $user->role = $request->input('role');
            $user->email = $request->input('email');
            $user->username = $request->input('username');
            $user->password = Hash::make($request->input('password'));
            $user->save();

            return redirect()->route('superadmin.user.index')->with('success', 'Data berhasil disimpan');
        }catch (ValidationException $e) {
            // Validation failed, redirect back with errors
            return redirect()->back()->withErrors($e->errors())->withInput();
        } catch (\Throwable $th) {
            // Handle any other exceptions or errors
            return back()->withErrors('Data gagal disimpan');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $user = User::findOrFail($id);

        return view('back.superadmin.user.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        try {
            $validator = Validator::make($request->all(), [
                'name' => 'required',
                'role' => 'required|in:Aktif,Nonaktif',
                'role' => 'required|in:superadmin,admin,user',
                'email' => 'required|email|unique:users,email,' . $id,
                'username' => 'required|unique:users,username,' . $id,
                'password' => 'nullable|confirmed|min:8',
            ]);
            if ($validator->fails()) {
                return back()
                    ->withErrors($validator)
                    ->withInput();
            }

            $user = User::findOrFail($id);
            $user->name = $request->input('name');
            $user->role = $request->input('role');
            $user->status = $request->input('status');
            if ($user->email !== $request->input('email')) {
                $user->email = $request->input('email');
            }
            if ($user->username !== $request->input('username')) {
                $user->username = $request->input('username');
            }

            if ($request->filled('password')) {
                $user->password = Hash::make($request->input('password'));
            }

            $user->save();

            return redirect()->route('superadmin.user.index')->with('success', 'Data berhasil diubah');
        } catch (ValidationException $e) {
            // Validation failed, redirect back with errors
            return redirect()->back()->withErrors($e->errors())->withInput();
        } catch (\Throwable $th) {
            // Handle any other exceptions or errors
            return back()->withErrors('Data gagal disimpan');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        try {
            $user = User::findOrFail($id);
            if (!is_null($user->foto)) {
                Storage::delete('fotos/' . $user->foto);
            }
            $user->delete();

            return redirect()->route('superadmin.user.index')->with('success', 'User Berhasil Dihapus');
        } catch (\Throwable $th) {
            return back()->withErrors('User gagal dihapus');
        }
    }
}
