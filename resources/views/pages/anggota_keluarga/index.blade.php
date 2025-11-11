@extends('layouts.admin.app')

@section('content')
    <div class="container-fluid">
        <h1 class="h3 mb-4 text-gray-800">Data Anggota Keluarga</h1>

        {{-- Alert sukses --}}
        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <!-- Tombol Tambah Data -->
        <a href="{{ route('anggota_keluarga.create') }}" class="btn btn-primary mb-3 d-inline-flex align-items-center gap-1">
            <ion-icon name="add-circle-outline" class="me-1"></ion-icon>
            Tambah Data
        </a>

        <div class="card shadow mb-4">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead class="thead-light">
                            <tr>
                                <th>No</th>
                                <th>Anggota ID</th>
                                <th>KK ID</th>
                                <th>Warga ID</th>
                                <th>Hubungan</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach ($anggota as $index => $data)
                                <tr>
                                    <td>{{ $index + 1 }}</td>

                                    {{-- Sesuai permintaan --}}
                                    <td>{{ $data->anggota_id }}</td>
                                    <td>{{ $data->kk_id }}</td>
                                    <td>{{ $data->warga_id }}</td>
                                    <td>{{ $data->hubungan }}</td>

                                    <td>
                                        <div style="display: inline-flex; align-items: center; gap: 3px;">
                                            <a href="{{ route('anggota_keluarga.edit', $data->anggota_id) }}"
                                                class="btn btn-warning btn-sm d-flex align-items-center gap-1">
                                                <ion-icon name="create-outline"></ion-icon>
                                                Edit
                                            </a>

                                            <form action="{{ route('anggota_keluarga.destroy', $data->anggota_id) }}"
                                                method="POST" style="margin: 0; padding: 0;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="button"
                                                    class="btn btn-danger btn-sm d-flex align-items-center gap-1 btn-delete">
                                                    <ion-icon name="trash-outline"></ion-icon>
                                                    Hapus
                                                </button>
                                            </form>
                                        </div>
                                    </td>


                                </tr>
                            @endforeach
                        </tbody>

                    </table>
                </div>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const deleteButtons = document.querySelectorAll('.btn-delete');

            deleteButtons.forEach(button => {
                button.addEventListener('click', function() {
                    const form = this.closest('form');

                    Swal.fire({
                        title: 'Apakah kamu yakin?',
                        text: "Data yang dihapus tidak bisa dikembalikan!",
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#d33',
                        cancelButtonColor: '#3085d6',
                        confirmButtonText: 'Ya, hapus!',
                        cancelButtonText: 'Batal',
                    }).then((result) => {
                        if (result.isConfirmed) {
                            form.submit();
                        }
                    });
                });
            });
        });
    </script>

    @if (session('success'))
        <script>
            Swal.fire({
                icon: 'success',
                title: 'Berhasil!',
                text: '{{ session('success') }}',
                timer: 2000,
                showConfirmButton: false
            });
        </script>
    @endif
@endsection
