@extends('layouts.admin.app')


@section('content')
    <div class="container-fluid">
        <h1 class="h3 mb-3 text-gray-800">Edit Anggota Keluarga</h1>


        <div class="card shadow mb-4 p-4">
            <form action="{{ route('anggota_keluarga.update', $anggota->anggota_id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="form-group mb-3">
                    <label for="anggota_id">ID Anggota</label>
                    <input type="text" name="anggota_id" id="anggota_id" class="form-control"
                        value="{{ $anggota->anggota_id }}" required>
                </div>


                <div class="form-group mb-3">
                    <label for="kk_id">Nomor KK</label>
                    <select name="kk_id" id="kk_id" class="form-control">
                        @foreach ($kk as $item)
                            <option value="{{ $item->kk_id }}" {{ $anggota->kk_id == $item->kk_id ? 'selected' : '' }}>
                                {{ $item->kk_nomor }}
                            </option>
                        @endforeach
                    </select>
                </div>


                <div class="form-group mb-3">
                    <label for="warga_id">Nama Warga</label>
                    <select name="warga_id" id="warga_id" class="form-control">
                        @foreach ($warga as $item)
                            <option value="{{ $item->warga_id }}"
                                {{ $anggota->warga_id == $item->warga_id ? 'selected' : '' }}>
                                {{ $item->nama }}
                            </option>
                        @endforeach
                    </select>
                </div>


                <div class="form-group mb-3">
                    <label for="hubungan">Hubungan Dalam Keluarga</label>
                    <input type="text" name="hubungan" id="hubungan" class="form-control"
                        value="{{ $anggota->hubungan }}">
                </div>


                <div class="d-flex justify-content-end mt-3">
                    <a href="{{ route('anggota_keluarga.index') }}" class="btn btn-secondary" style="margin-right: 5px;">
                        Kembali
                    </a>
                    <button type="submit" class="btn btn-primary">
                        Simpan Perubahan
                    </button>
                </div>




            </form>
        </div>
    </div>
@endsection
