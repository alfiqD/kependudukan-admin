@extends('layouts.admin')

@section('content')
<style>
    /* Warna label biru */
    label {
        color: #005bbc; /* biru bootstrap */
        font-weight: 600;
    }

    /* Warna teks input lebih terang */
    input::placeholder,
    textarea::placeholder {
        color: #dcdcdc !important; /* abu muda mendekati putih */
        opacity: 1;
    }

    input, textarea {
        color: #f8f9fa; /* teks di input juga agak putih */
        background-color: #2e2e2e; /* opsional: sedikit gelap biar kontras */
        border: 1px solid #6c757d;
    }

    input:focus, textarea:focus {
        border-color: #007bff;
        box-shadow: 0 0 5px rgba(0, 123, 255, 0.4);
    }
</style>

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
                            <input type="text" name="kepala_keluarga_warga_id" id="kepala_keluarga_warga_id" class="form-control" placeholder="Masukkan Nama Kepala Keluarga" required>
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
