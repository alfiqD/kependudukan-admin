<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('pages.auth.login-form');
    }

     // Proses login
    public function login(Request $request)
    {
        // Validasi input
        $request->validate([
            'username' => 'required|string|max:255',
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

        // Cek user di database
    $user = User::where('name', $request->username) // pakai name, bukan username
            ->where('email', $request->email)
            ->first();

    if (!$user || !Hash::check($request->password, $user->password)) {
        // Kalau gagal, kembali ke login dengan pesan error
        return redirect('/auth')
                ->withErrors(['login' => 'Username, email, atau password salah!'])
                ->withInput($request->only('username', 'email'));
    }

     // 🔥 WAJIB — SIMPAN USER KE SESSION
    Auth::login($user);

        // Kalau valid, tampilkan halaman success
        return view('pages.auth.success', [
            'username' => $request->username,
            'email' => $request->email,
            'password' => $request->password
        ]);
    }

    // Tampilkan form registrasi
    public function showRegisterForm()
    {
        return view('pages.auth.register-form');
    }

    // Proses registrasi
    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required|min:3',
            'email' => 'required|email',
            'password' => [
                'required',
                'min:3',
                'regex:/[A-Z]/',
                'confirmed'
            ],
            'role' => 'required|string', // wajib ada role
        ], [
            //'name.required' => 'Nama lengkap wajib diisi!',
            'name.required' => 'Nama wajib diisi!',
            'name.min' => 'Nama minimal 3 karakter!',
            'email.required' => 'Email wajib diisi!',
            'email.email' => 'Format email tidak valid!',
            'password.required' => 'Password wajib diisi!',
            'password.min' => 'Password minimal 3 karakter!',
            'password.regex' => 'Password harus mengandung huruf kapital!',
            'password.confirmed' => 'Konfirmasi password tidak cocok!',
            'role.required' => 'Role wajib dipilih!'
        ]);

        $user = User::create([
        'name' => $request->name,
        'email' => $request->email,
        'password' => Hash::make($request->password),// hash password
        'role' => $request['role'],
    ]);

        // Simulasi berhasil daftar (belum simpan ke DB)
        return view('pages.auth.register-success', [
            'title' => 'Registrasi Berhasil',
            'name' => $request->name,
            'email' => $request->email,
            'password' => $request->password,
            'role' => $request->role
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
