@extends('layouts.admin.app')

@section('content')
<div class="container-fluid">
<h1 class="h3 mb-4 text-gray-800">Edit Data User</h1>

    <div class="card shadow mb-4">
        <div class="card-body">
            {{-- Form edit user --}}
            <form action="{{ route('users.update', $user->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="row">
                    {{-- Nama --}}
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="name" class="font-weight-bold text-primary">Nama</label>
                            <input type="text" name="name" id="name" class="form-control"
                                value="{{ old('name', $user->name) }}" required>
                            @error('name')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>

                    {{-- Password --}}
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="password" class="font-weight-bold text-primary">Password Baru</label>
                            <input type="password" name="password" id="password" class="form-control"
                                placeholder="Kosongkan jika tidak ingin mengubah">
                            @error('password')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>
                </div>

                <div class="row mt-3">
                    {{-- Email --}}
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="email" class="font-weight-bold text-primary">Email</label>
                            <input type="email" name="email" id="email" class="form-control"
                                value="{{ old('email', $user->email) }}" required>
                            @error('email')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>

                    {{-- Konfirmasi Password --}}
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="password_confirmation" class="font-weight-bold text-primary">Konfirmasi Password</label>
                            <input type="password" name="password_confirmation" id="password_confirmation"
                                class="form-control" placeholder="Ulangi password baru jika diubah">
                        </div>
                    </div>


                </div>
<div class="mb-3">
    <label for="role" class="form-label">Role</label>
    <select name="role" class="form-control" required>
        <option value="admin"   {{ $user->role == 'admin' ? 'selected' : '' }}>Admin</option>
        <option value="petugas" {{ $user->role == 'petugas' ? 'selected' : '' }}>Petugas</option>
        <option value="warga"   {{ $user->role == 'warga' ? 'selected' : '' }}>Warga</option>
    </select>
</div>
                {{-- Tombol aksi --}}
                <div class="form-group mt-4 text-right">
                    <a href="{{ route('users.index') }}" class="btn btn-secondary">Kembali</a>
                    <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                </div>
            </form>
        </div>
    </div>
</div>


@endsection
