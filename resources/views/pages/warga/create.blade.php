@extends('layouts.admin.app')

@section('content')
    <div class="container-fluid">
        <h1 class="h3 mb-4 text-gray-800">Tambah Data Warga</h1>

        <div class="card shadow mb-4">
            <div class="card-body">
                <form action="{{ route('warga.store') }}" method="POST">
                    @csrf
                    <div class="row">
                        {{-- Kolom kiri --}}
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="no_ktp">Nomor KTP</label>
                                <input type="text" name="no_ktp" id="no_ktp" class="form-control"
                                    placeholder="Masukkan Nomor KTP" required>
                            </div>

                            <div class="form-group mt-3">
                                <label for="nama">Nama Lengkap</label>
                                <input type="text" name="nama" id="nama" class="form-control"
                                    placeholder="Masukkan Nama Lengkap" required>
                            </div>

                            <div class="form-group">
                                <label for="jenis_kelamin" class="font-weight-bold text-primary">Jenis Kelamin</label>
                                <select name="jenis_kelamin" id="jenis_kelamin" class="form-control" required>
                                    <option value="">-- Pilih Jenis Kelamin --</option>
                                    <option value="L" {{ old('jenis_kelamin') == 'L' ? 'selected' : '' }}>
                                        Laki-laki</option>
                                    <option value="P" {{ old('jenis_kelamin') == 'P' ? 'selected' : '' }}>
                                        Perempuan</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="agama" class="font-weight-bold text-primary">Agama</label>
                                <select name="agama" id="agama" class="form-control" required>
                                    <option value="">-- Pilih Agama --</option>
                                    <option value="Islam" {{ old('agama') == 'Islam' ? 'selected' : '' }}>Islam</option>
                                    <option value="Kristen" {{ old('agama') == 'Kristen' ? 'selected' : '' }}>Kristen
                                    </option>
                                    <option value="Katolik" {{ old('agama') == 'Katolik' ? 'selected' : '' }}>Katolik
                                    </option>
                                    <option value="Hindu" {{ old('agama') == 'Hindu' ? 'selected' : '' }}>Hindu</option>
                                    <option value="Buddha" {{ old('agama') == 'Buddha' ? 'selected' : '' }}>Buddha</option>
                                    <option value="Konghucu" {{ old('agama') == 'Konghucu' ? 'selected' : '' }}>Konghucu
                                    </option>
                                </select>
                            </div>

                        </div>

                        {{-- Kolom kanan --}}
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="pekerjaan">Pekerjaan</label>
                                <input type="text" name="pekerjaan" id="pekerjaan" class="form-control"
                                    placeholder="Masukkan Pekerjaan" required>
                            </div>

                            <div class="form-group mt-3">
                                <label for="telp">Nomor Telepon</label>
                                <input type="text" name="telp" id="telp" class="form-control"
                                    placeholder="Masukkan Nomor Telepon" required>
                            </div>

                            <div class="form-group mt-3">
                                <label for="email">Email</label>
                                <input type="email" name="email" id="email" class="form-control"
                                    placeholder="Masukkan Email Aktif" required>
                            </div>

                            {{-- Tombol sejajar kanan bawah --}}
                            <div class="form-group mt-4 text-right">
                                <a href="{{ route('warga.index') }}" class="btn btn-secondary">Kembali</a>
                                <button type="submit" class="btn btn-primary">Simpan</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
