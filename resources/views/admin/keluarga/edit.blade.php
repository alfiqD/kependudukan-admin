@extends('layouts.admin.app')

@section('content')
<div class="container-fluid">
    <h1 class="h3 mb-4 text-gray-800">Edit Data Kartu Keluarga</h1>

    <div class="card shadow mb-4">
        <div class="card-body">
        <form action="{{ route('keluarga_kk.update', $keluargaKK->kk_id) }}" method="POST">

                @csrf
                @method('PUT')

                <div class="row">
                    {{-- Kolom kiri --}}
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="kk_nomor">Nomor Kartu Keluarga</label>
                            <input type="text" name="kk_nomor" id="kk_nomor" class="form-control"
                                value="{{ old('kk_nomor', $keluargaKK->kk_nomor) }}" placeholder="Masukkan Nomor KK" required>
                        </div>

                        <div class="form-group mt-3">
                            <label for="kepala_keluarga_warga_id">Nama Kepala Keluarga</label>
                            <input type="text" name="kepala_keluarga_warga_id" id="kepala_keluarga_warga_id" class="form-control"
                                value="{{ old('kepala_keluarga_warga_id', $keluargaKK->kepala_keluarga_warga_id) }}" placeholder="Masukkan Nama Kepala Keluarga" required>
                        </div>

                        <div class="form-group mt-3">
                            <label for="alamat">Alamat</label>
                            <textarea name="alamat" id="alamat" class="form-control" rows="3" placeholder="Masukkan Alamat" required>{{ old('alamat', $keluargaKK->alamat) }}</textarea>
                        </div>
                    </div>

                    {{-- Kolom kanan --}}
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="rt">RT</label>
                            <input type="text" name="rt" id="rt" class="form-control"
                                value="{{ old('rt', $keluargaKK->rt) }}" placeholder="Masukkan RT" required>
                        </div>

                        <div class="form-group mt-3">
                            <label for="rw">RW</label>
                            <input type="text" name="rw" id="rw" class="form-control"
                                value="{{ old('rw', $keluargaKK->rw) }}" placeholder="Masukkan RW" required>
                        </div>

                        {{-- Tombol sejajar kanan bawah --}}
                        <div class="form-group mt-4 text-right">
                            <a href="{{ route('keluarga_kk.index') }}" class="btn btn-secondary">Kembali</a>
                            <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
