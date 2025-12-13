@extends('layouts.admin.app')

@section('content')
<div class="container-fluid">

    <h1 class="h3 mb-4 text-gray-800">Tambah Data User</h1>

    <div class="card shadow mb-4">
        <div class="card-body">

            <form action="{{ route('users.store') }}"
                  method="POST"
                  enctype="multipart/form-data">
                @csrf

                {{-- ROW 1 --}}
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="font-weight-bold text-primary">
                                Nama
                            </label>
                            <input type="text"
                                   name="name"
                                   class="form-control"
                                   placeholder="Masukkan nama lengkap"
                                   value="{{ old('name') }}"
                                   required>
                            @error('name')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="font-weight-bold text-primary">
                                Password
                            </label>
                            <input type="password"
                                   name="password"
                                   class="form-control"
                                   placeholder="Masukkan password"
                                   required>
                            @error('password')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>
                </div>

                {{-- ROW 2 --}}
                <div class="row mt-3">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="font-weight-bold text-primary">
                                Email
                            </label>
                            <input type="email"
                                   name="email"
                                   class="form-control"
                                   placeholder="Masukkan email aktif"
                                   value="{{ old('email') }}"
                                   required>
                            @error('email')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="font-weight-bold text-primary">
                                Konfirmasi Password
                            </label>
                            <input type="password"
                                   name="password_confirmation"
                                   class="form-control"
                                   placeholder="Ulangi password"
                                   required>
                        </div>
                    </div>
                </div>

                {{-- ROW 3 --}}
                <div class="row mt-3">
                    {{-- FOTO PROFIL KIRI --}}
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="font-weight-bold text-primary">
                                Foto Profil <small class="text-muted">(Opsional)</small>
                            </label>
                            <input type="file"
                                   name="profile_picture"
                                   class="form-control"
                                   accept="image/*">
                            @error('profile_picture')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>

                    {{-- ROLE KANAN --}}
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="font-weight-bold text-primary">
                                Role
                            </label>
                            <select name="role"
        class="form-control"
        required>
    <option value="">-- Pilih Role --</option>

    <option value="admin" {{ old('role') == 'admin' ? 'selected' : '' }}>
        Admin
    </option>

    <option value="staff_desa" {{ old('role') == 'staff_desa' ? 'selected' : '' }}>
        Staff Desa
    </option>

    <option value="kepala_desa" {{ old('role') == 'kepala_desa' ? 'selected' : '' }}>
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
                    <a href="{{ route('users.index') }}"
                       class="btn btn-secondary">
                        Kembali
                    </a>
                    <button type="submit"
                            class="btn btn-primary">
                        Simpan
                    </button>
                </div>

            </form>

        </div>
    </div>
</div>
@endsection
