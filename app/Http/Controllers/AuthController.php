<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function __construct()
    {
        // Middleware untuk memastikan pengguna belum login
        $this->middleware('cekBelumLogin')->only(['index', 'login']);
        // Middleware untuk memastikan pengguna sudah login
        $this->middleware('cekSudahLogin')->only('logout');
    }

    // menampilkan halaman login
    public function index()
    {
        return view('auth/login', ['title' => 'Login']);
    }


    // proses login
    public function login(Request $request)
    {
        $request->validate([
            'email'     => 'required|email:rfc',
            'password'  => 'required|string|min:8',
        ]);

        $user = User::where('email', $request->email)->first();

        if ($user) {
            if (password_verify($request->password, $user->password)) {
                session(['id' => $user->id]);
                return redirect('/dashboard');
            }
        }

        return redirect('/login')->with('error', 'Surel / Kata sandi salah !!');
    }


    // proses logout
    public function logout()
    {
        if (session()->has('id')) {
            session()->forget(['id']);
            return redirect('/login')->with('success', 'Anda berhasil logout.');
        }
    }
}
