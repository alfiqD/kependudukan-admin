<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('auth.login-form');
    }

     // Proses login
    public function login(Request $request)
    {
        // Validasi input
        $request->validate([
            'username' => 'required',
            'email' => 'required|email',
            'password' => [
                'required',
                'min:3',
                'regex:/[A-Z]/'
            ]
        ], [
            'username.required' => 'Nama/Username wajib diisi!',
            'email.required' => 'Email wajib diisi!',
            'email.email' => 'Format email tidak valid!',
            'password.required' => 'Password wajib diisi!',
            'password.min' => 'Password minimal 3 karakter!',
            'password.regex' => 'Password harus mengandung huruf kapital!'
        ]);

        // Kalau valid, tampilkan halaman success
        return view('auth.success', [
            'username' => $request->username,
            'email' => $request->email,
            'password' => $request->password
        ]);
    }


    // Tampilkan form registrasi
    public function showRegisterForm()
    {
        return view('auth.register-form');
    }

    // Proses registrasi
    public function register(Request $request)
    {
        $request->validate([
            // 'name' => 'required',
            'username' => 'required|min:3',
            'email' => 'required|email',
            'password' => [
                'required',
                'min:3',
                'regex:/[A-Z]/',
                'confirmed'
            ]
        ], [
            //'name.required' => 'Nama lengkap wajib diisi!',
            'username.required' => 'Username wajib diisi!',
            'username.min' => 'Username minimal 3 karakter!',
            'email.required' => 'Email wajib diisi!',
            'email.email' => 'Format email tidak valid!',
            'password.required' => 'Password wajib diisi!',
            'password.min' => 'Password minimal 3 karakter!',
            'password.regex' => 'Password harus mengandung huruf kapital!',
            'password.confirmed' => 'Konfirmasi password tidak cocok!'
        ]);

        // Simulasi berhasil daftar (belum simpan ke DB)
        return view('auth.register-success', [
            'title' => 'Registrasi Berhasil',
            'username' => $request->username,
            'email' => $request->email,
            'password' => $request->password
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
