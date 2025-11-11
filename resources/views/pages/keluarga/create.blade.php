@extends('layouts.admin.app')

@section('content')
<div class="container-fluid">
    <h1 class="h3 mb-4 text-gray-800">Tambah Data Kartu Keluarga</h1>

    <div class="card shadow mb-4">
        <div class="card-body">
            <form action="{{ route('keluarga_kk.store') }}" method="POST">
                @csrf
                <div class="row">
                    {{-- Kolom kiri --}}
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="kk_nomor">Nomor Kartu Keluarga</label>
                            <input type="text" name="kk_nomor" id="kk_nomor" class="form-control" placeholder="Masukkan Nomor KK" required>
                        </div>

                        <div class="form-group mt-3">
    <label for="kepala_keluarga_warga_id">Nama Kepala Keluarga</label>
    <select name="kepala_keluarga_warga_id" id="kepala_keluarga_warga_id" class="form-control" required>
        <option value="">-- Pilih Kepala Keluarga --</option>
        @foreach($warga as $item)
            <option value="{{ $item->warga_id }}">{{ $item->nama }}</option>
        @endforeach
    </select>
</div>

                        <div class="form-group mt-3">
                            <label for="alamat">Alamat</label>
                            <textarea name="alamat" id="alamat" class="form-control" rows="3" placeholder="Masukkan Alamat" required></textarea>
                        </div>
                    </div>

                    {{-- Kolom kanan --}}
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="rt">RT</label>
                            <input type="text" name="rt" id="rt" class="form-control" placeholder="Masukkan RT" required>
                        </div>

                        <div class="form-group mt-3">
                            <label for="rw">RW</label>
                            <input type="text" name="rw" id="rw" class="form-control" placeholder="Masukkan RW" required>
                        </div>

                        {{-- Tombol sejajar kanan bawah --}}
                        <div class="form-group mt-4 text-right">
                            <a href="{{ route('keluarga_kk.index') }}" class="btn btn-secondary">Kembali</a>
                            <button type="submit" class="btn btn-primary">Simpan</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
