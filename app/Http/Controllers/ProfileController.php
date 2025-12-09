<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ProfileController extends Controller
{
    /**
     * Tampilkan halaman profil (READ)
     */
    public function index()
    {
        $user = Auth::user();
        return view('pages.profile.index', compact('user'));
    }

    /**
     * Form edit profil
     */
    public function edit($id)
    {
        $user = Auth::user();

        // Pastikan user hanya bisa edit dirinya sendiri
        if ($user->id != $id) {
            abort(403, 'Unauthorized');
        }

        return view('pages.profile.edit', compact('user'));
    }

    /**
     * Update data profil (nama, password optional, foto optional)
     */
    public function update(Request $request, $id)
    {
        $user = Auth::user();

        if ($user->id != $id) {
            abort(403, 'Unauthorized');
        }

        // Validasi input
        $request->validate([
            'name' => 'required|string|max:255',
            'password' => 'nullable|min:5',
            'foto' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        // Update nama
        $user->name = $request->name;

        // Update password jika diisi
        if ($request->filled('password')) {
            $user->password = bcrypt($request->password);
        }

        // Update foto jika ada
        if ($request->hasFile('foto')) {

            // Hapus foto lama jika bukan default
            if ($user->foto && $user->foto != 'default.png') {
                Storage::delete('public/profile/'.$user->foto);
            }

            // Simpan foto baru
            $fotoName = time().'.'.$request->foto->extension();
            $request->foto->storeAs('public/profile', $fotoName);

            $user->foto = $fotoName;
        }

        $user->save();

        return redirect()->route('profile.index')->with('success', 'Profil berhasil diperbarui!');
    }
}
