@extends('layouts.admin.app')

@section('content')
<div class="container-fluid">

    <h1 class="h3 mb-4 text-gray-800">Edit Data User</h1>

    <div class="card shadow mb-4">
        <div class="card-body">

            <form action="{{ route('users.update', $user->id) }}"
      method="POST"
      enctype="multipart/form-data">
    @csrf
    @method('PUT')

    {{-- ROW 1 --}}
    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <label>Nama</label>
                <input type="text" name="name" class="form-control"
                       value="{{ old('name', $user->name) }}" required>
            </div>
        </div>

        <div class="col-md-6">
            <div class="form-group">
                <label>Password Baru</label>
                <input type="password" name="password"
                       class="form-control"
                       placeholder="Kosongkan jika tidak diubah">
            </div>
        </div>
    </div>

    {{-- ROW 2 --}}
    <div class="row mt-3">
        <div class="col-md-6">
            <div class="form-group">
                <label>Email</label>
                <input type="email" name="email"
                       class="form-control"
                       value="{{ old('email', $user->email) }}" required>
            </div>
        </div>

        <div class="col-md-6">
            <div class="form-group">
                <label>Konfirmasi Password</label>
                <input type="password" name="password_confirmation"
                       class="form-control"
                       placeholder="Ulangi password">
            </div>
        </div>
    </div>

    {{-- ROW 3 --}}
    <div class="row mt-3">
        {{-- FOTO PROFIL PINDAH KE KIRI --}}
        <div class="col-md-6">
            <div class="form-group">
                <label>Avatar</label>
<input type="file" name="avatar"
       class="form-control" accept="image/*">

                @if ($user->profile_picture)
                    <div class="mt-2">
    <small>Avatar saat ini:</small><br>
    <img src="{{ $user->avatar_url }}"
         class="rounded-circle border"
         width="120"
         height="120"
         style="object-fit: cover;">
</div>
                @endif
            </div>
        </div>

        {{-- ROLE PINDAH KE KANAN --}}
        <div class="col-md-6">
            <div class="form-group">
    <label class="font-weight-bold text-primary">Role</label>
    <select name="role" class="form-control" required>
        <option value="admin" {{ $user->role === 'admin' ? 'selected' : '' }}>
            Admin
        </option>

        <option value="staff_desa" {{ $user->role === 'staff_desa' ? 'selected' : '' }}>
            Staff Desa
        </option>

        <option value="kepala_desa" {{ $user->role === 'kepala_desa' ? 'selected' : '' }}>
            Kepala Desa
        </option>
    </select>

    @error('role')
        <small class="text-danger">{{ $message }}</small>
    @enderror
</div>

        </div>
    </div>

    {{-- BUTTON --}}
    <div class="text-end mt-4">
        <a href="{{ route('users.index') }}" class="btn btn-secondary">Kembali</a>
        <button type="submit" class="btn btn-primary">Simpan</button>
    </div>
</form>


        </div>
    </div>
</div>
@endsection
