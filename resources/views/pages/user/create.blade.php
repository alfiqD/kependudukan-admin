@extends('layouts.admin.app')

@section('content')

<div class="container-fluid"> <h1 class="h3 mb-4 text-gray-800">Tambah Data User</h1>
<div class="card shadow mb-4">
    <div class="card-body">
        {{-- Form tambah user --}}
        <form action="{{ route('users.store') }}" method="POST" enctype="multipart/form-data" >
            @csrf
            <div class="row">
                {{-- Kolom kiri: Nama --}}
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="name" class="font-weight-bold text-primary">Nama</label>
                        <input type="text" name="name" id="name" class="form-control"
                            placeholder="Masukkan Nama Lengkap" required>
                        @error('name')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                </div>

                {{-- Kolom kanan: Password --}}
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="password" class="font-weight-bold text-primary">Password</label>
                        <input type="password" name="password" id="password" class="form-control"
                            placeholder="Masukkan Password" required>
                        @error('password')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                </div>
            </div>

            <div class="row mt-3">
                {{-- Kolom kiri: Email --}}
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="email" class="font-weight-bold text-primary">Email</label>
                        <input type="email" name="email" id="email" class="form-control"
                            placeholder="Masukkan Email Aktif" required>
                        @error('email')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                </div>

                {{-- Kolom kanan: Konfirmasi Password --}}
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="password_confirmation" class="font-weight-bold text-primary">Konfirmasi Password</label>
                        <input type="password" name="password_confirmation" id="password_confirmation"
                            class="form-control" placeholder="Masukkan Ulang Password" required>
                    </div>
                </div>
            </div>

            {{-- FOTO PROFIL (TAMBAHAN)
    <div class="row mt-3">
        <div class="col-md-6">
            <div class="form-group">
                <label class="font-weight-bold text-primary">Foto Profil</label>
                <input type="file" name="profile_picture" class="form-control">
            </div>
        </div>
    </div> --}}

            {{-- Tombol aksi --}}
            <div class="form-group mt-4 text-right">
                <a href="{{ route('users.index') }}" class="btn btn-secondary">Kembali</a>
                <button type="submit" class="btn btn-primary">Simpan</button>
            </div>
        </form>
    </div>
</div>

</div> @endsection
