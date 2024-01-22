<?php

namespace App\Http\Controllers;

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
        return view('front.login');
    }


    public function store_register(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
            'username' => 'required|unique:users,username',
            'password' => 'required|confirmed|min:8',
        ]);

        if ($validator->fails()) {
            return $this->withError('Validation Error', $validator->errors(), 30);
        }

        $data = User::create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'username' => $request->input('username'),
            'password' => Hash::make($request->input('password')),
        ]);

        return redirect()->route('login')->withSuccess('Berhasil register, silahkan login menggunakan akun yang anda daftarkan!');
    }

    public function authenticate(Request $request)
    {
        // dd($request);

        $data = [
            'username' => $request->input('username'),
            'password' => $request->input('password'),
        ];

        Auth::attempt($data);

        if (Auth::check()) { // true sekalian session field di users nanti bisa dipanggil via Auth
            //Login Success
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

        } else { // false

            //Login Fail

            return redirect()->route('login')->withErrors('Username atau password salah');
        }
    }

    public function logout(Request $req)
    {
        Auth::logout();
        return redirect()->route('home')->withSuccess('Anda berhasil logout');
    }
}
