@extends('layouts.admin.app')

@section('content')
    <div class="container-fluid">
        <h1 class="h3 mb-3 text-gray-800">Tambah Anggota Keluarga</h1>

        <div class="card shadow mb-4 p-4">
            <form action="{{ route('anggota_keluarga.store') }}" method="POST">
                @csrf

                {{-- Input anggota_id --}}
                <div class="form-group mb-3">
                    <label for="anggota_id">ID Anggota</label>
                    <input type="text" name="anggota_id" id="anggota_id" class="form-control"
                        placeholder="Masukkan ID anggota">
                </div>

                <div class="form-group mb-3">
                    <label for="kk_id">Nomor KK</label>
                    <select name="kk_id" id="kk_id" class="form-control">
                        <option value="">-- Pilih Nomor KK --</option>
                        @foreach ($kk as $item)
                            <option value="{{ $item->kk_id }}">{{ $item->kk_nomor }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group mb-3">
                    <label for="warga_id">Nama Warga</label>
                    <select name="warga_id" id="warga_id" class="form-control">
                        <option value="">-- Pilih Warga --</option>
                        @foreach ($warga as $item)
                            <option value="{{ $item->warga_id }}">{{ $item->nama }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group mb-3">
                    <label for="hubungan">Hubungan Dalam Keluarga</label>
                    <input type="text" name="hubungan" id="hubungan" class="form-control"
                        placeholder="Contoh: Ayah, Ibu, Anak">
                </div>

                {{-- Tombol sejajar kanan bawah --}}
                        <div class="form-group mt-4 text-right">
                            <a href="{{ route('anggota_keluarga.index') }}" class="btn btn-secondary">Kembali</a>
                            <button type="submit" class="btn btn-primary">Simpan</button>
                        </div>
            </form>
        </div>
    </div>
@endsection
