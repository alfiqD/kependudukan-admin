<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
{
    $search = $request->input('search');
    $filter = $request->input('filter');

    $query = User::orderBy('id', 'asc');

    // 🔎 Search berdasarkan NAME saja
    if ($search) {
        $query->where('name', 'like', '%' . $search . '%');
    }

    // 🔽 Filter domain email
    if ($filter) {
        if ($filter == 'gmail') {
            $query->where('email', 'like', '%@gmail.%');
        } elseif ($filter == 'yahoo') {
            $query->where('email', 'like', '%@yahoo.%');
        } elseif ($filter == 'outlook') {
            $query->where('email', 'like', '%@outlook.%');
        } elseif ($filter == 'lainnya') {
            $query->where(function ($q) {
                $q->where('email', 'not like', '%@gmail.%')
                    ->where('email', 'not like', '%@yahoo.%')
                    ->where('email', 'not like', '%@outlook.%');
            });
        }
    }

    // 📌 Pagination 10 data
    $users = $query->paginate(10);

    // Agar search & filter tetap ketika pindah halaman
    $users->appends($request->all());

    return view('pages.user.index', compact('users', 'search', 'filter'));
}


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages.user.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validasi input
    $validated = $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|email|unique:users,email',
        'password' => 'required|confirmed|min:6',
    ]);

    // Enkripsi password sebelum disimpan
    $validated['password'] = Hash::make($request->password);

    // Simpan ke database
    User::create($validated);

    // Redirect ke halaman index dengan pesan sukses
    return redirect()->route('users.index')->with('success', 'Data berhasil ditambahkan.');
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
        $user = User::findOrFail($id);
        return view('pages.user.edit', compact('user'));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $user = User::findOrFail($id);

        $user->update([
        'name' => $request->name,
        'email' => $request->email,
        // kalau password boleh diubah, pastikan di-hash ulang:
        'password' => $request->password ? Hash::make($request->password) : $user->password,
    ]);

    return redirect()->route('users.index')->with('success', 'Data berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $user = User::findOrFail($id);
        $user->delete();
        return redirect()->route('users.index')->with('success', 'Data user berhasil dihapus!');
    }
}
