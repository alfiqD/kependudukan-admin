@extends('admin.dashboard')

@section('content')
<div class="container-fluid">
    <h1 class="h3 mb-4 text-gray-800">Data Keluarga KK</h1>

    {{-- Alert sukses --}}
    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <a href="{{ route('keluarga_kk.create') }}" class="btn btn-primary mb-3">+ Tambah Data</a>

    <div class="card shadow mb-4">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered">
                    <thead class="thead-light">
                        <tr>
                            <th>ID</th>
                            <th>Nomor KK</th>
                            <th>Kepala Keluarga</th>
                            <th>Alamat</th>
                            <th>RT</th>
                            <th>RW</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($keluarga as $data)
                            <tr>
                                <td>{{ $data->kk_id }}</td>
                                <td>{{ $data->kk_nomor }}</td>
                                <td>{{ $data->kepala_keluarga_warga_id }}</td>
                                <td>{{ $data->alamat }}</td>
                                <td>{{ $data->rt }}</td>
                                <td>{{ $data->rw }}</td>
                                <td>
                                    <a href="{{ route('keluarga_kk.edit', $data) }}" class="btn btn-warning btn-sm">Edit</a>
                                    <form action="{{ route('keluarga_kk.destroy', $data) }}" method="POST" class="d-inline">

                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-danger btn-sm" onclick="return confirm('Yakin mau hapus data ini?')">Hapus</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
