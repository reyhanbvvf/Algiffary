<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    public function login()
    {
        return view('front.login');
    }

    public function register()
    {
        return view('front.register');
    }


    public function store_register(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
            'username' => 'required|unique:users,username',
            'password' => 'required|confirmed|min:8',
        ]);

        $data = User::create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'username' => $request->input('username'),
            'role' => 'user',
            'status' => 'Nonaktif',
            'password' => Hash::make($request->input('password')),
        ]);

        return redirect()->route('login')->withSuccess('Berhasil Melakukan Registrasi akun');
    }

    public function authenticate(Request $request)
    {

        $data = [
            'username' => $request->input('username'),
            'password' => $request->input('password'),
        ];

        if (Auth::attempt($data)) {
            // Check if the user is active
            if (Auth::user()->status == 'Nonaktif') {
                Auth::logout(); // Logout the user if status is "Nonaktif"
                return redirect()->route('login')->withErrors('Akun nonaktif, tidak dapat login');
            }

            // Login Success
            switch (Auth::user()->role) {
                case 'superadmin':
                    return redirect()->route('superadmin.index')->withSuccess('Berhasil login');
                    break;
                case 'admin':
                    return redirect()->route('admin.index')->withSuccess('Berhasil login');
                    break;
                default:
                    return redirect()->route('user.index')->withSuccess('Berhasil login');
            }
        } else {
            // Login Fail
            return redirect()->route('login')->withErrors('Username atau password salah');
        }
    }

    public function logout(Request $request)
    {
        Auth::logout();
        return redirect()->route('home')->withSuccess('Anda berhasil logout');
    }
}
