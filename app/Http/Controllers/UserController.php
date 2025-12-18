<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

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

        //Search nama
        if ($search) {
            $query->where('name', 'like', '%' . $search . '%');
        }

        // Filter domain email
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

        $users = $query->paginate(10);
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
        $validated = $request->validate([
            'name'   => 'required|string|max:255',
            'email'  => 'required|email|unique:users,email',
            'password' => 'required|confirmed|min:6',
            'role'   => 'required|in:admin,staff_desa,kepala_desa',
            'avatar' => 'nullable|image|mimes:jpg,jpeg,png|max:2048', // <- ubah sini
    ]);

        // hash password
        $validated['password'] = Hash::make($request->password);

        // upload foto jika ada
        if ($request->hasFile('avatar')) { // <- ubah nama field
            $validated['avatar'] =
                $request->file('avatar')
                        ->store('media/profile_pictures', 'public');
        }

        User::create($validated);


        return redirect()->route('users.index')
            ->with('success', 'Data berhasil ditambahkan.');
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

        $validated = $request->validate([
        'name'   => 'required|string|max:255',
        'email'  => 'required|email|unique:users,email,' . $id,
        'role'   => 'required|in:admin,staff_desa,kepala_desa',
        'password' => 'nullable|confirmed|min:6',
        'avatar' => 'nullable|image|mimes:jpg,jpeg,png|max:2048', // <- ubah sini
    ]);

        // password optional
        if ($request->filled('password')) {
            $validated['password'] = Hash::make($request->password);
        } else {
            unset($validated['password']);
        }

        // ganti foto jika upload baru
        if ($request->hasFile('avatar')) { // <- ubah sini
            if ($user->avatar && Storage::disk('public')->exists($user->avatar)) {
                Storage::disk('public')->delete($user->avatar);
            }

            $validated['avatar'] =
                $request->file('avatar')
                        ->store('media/profile_pictures', 'public');
        }

        $user->update($validated);


        return redirect()->route('users.index')
            ->with('success', 'Data berhasil diperbarui.');
        }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $user = User::findOrFail($id);

        if ($user->avatar &&
    Storage::disk('public')->exists($user->avatar)) {
    Storage::disk('public')->delete($user->avatar);
}

        $user->delete();

        return redirect()->route('users.index')
            ->with('success', 'Data user berhasil dihapus!');
    }

    // ===============================
    // 🔥 PROFILE USER (LOGIN)
    // ===============================

    /**
     * Halaman profil user login
     */
    public function profile()
    {
        return view('profile.index');
    }

    /**
     * Update foto profil user login
     */
    public function updateProfilePicture(Request $request)
    {
        $request->validate([
    'avatar' => 'required|image|mimes:jpg,jpeg,png|max:2048', // <- ubah nama field
]);

$user = Auth::user();

if ($user->avatar && Storage::disk('public')->exists($user->avatar)) {
    Storage::disk('public')->delete($user->avatar);
}

$path = $request->file('avatar')
                ->store('media/profile_pictures', 'public');

$user->update([
    'avatar' => $path,
]);


        return back()->with('success', 'Foto profil berhasil diperbarui');
    }
}
