@extends('admin.dashboard')

@section('content')
<div class="container-fluid">
    <h1 class="h3 mb-4 text-gray-800">Edit Data Keluarga KK</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Terjadi kesalahan!</strong>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('keluarga_kk.update', $keluarga->kk_id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label>Nomor KK</label>
            <input type="text" name="kk_nomor" class="form-control" value="{{ old('kk_nomor', $keluarga->kk_nomor) }}">
        </div>
        <div class="form-group">
            <label>Kepala Keluarga</label>
            <input type="text" name="kepala_keluarga_warga_id" class="form-control" value="{{ old('kepala_keluarga_warga_id', $keluarga->kepala_keluarga_warga_id) }}">
        </div>
        <div class="form-group">
            <label>Alamat</label>
            <input type="text" name="alamat" class="form-control" value="{{ old('alamat', $keluarga->alamat) }}">
        </div>
        <div class="form-group">
            <label>RT</label>
            <input type="text" name="rt" class="form-control" value="{{ old('rt', $keluarga->rt) }}">
        </div>
        <div class="form-group">
            <label>RW</label>
            <input type="text" name="rw" class="form-control" value="{{ old('rw', $keluarga->rw) }}">
        </div>

        <button type="submit" class="btn btn-primary">Update</button>
        <a href="{{ route('keluarga_kk.index') }}" class="btn btn-secondary">Kembali</a>
    </form>
</div>
@endsection
