@extends('layouts.admin.app')

@section('content')
<div class="container-fluid">
    <h1 class="h3 mb-4 text-gray-800">Data Peristiwa Kelahiran</h1>

    {{-- Alert sukses --}}
    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <!-- Tombol Tambah Data -->
    <a href="{{ route('peristiwa_kelahiran.create') }}"
       class="btn btn-primary mb-3 d-inline-flex align-items-center gap-1">
        <ion-icon name="add-circle-outline"></ion-icon> Tambah Data
    </a>

    <div class="card shadow mb-4">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered">
                    <thead class="thead-light">
                        <tr>
                            <th>No</th>
                            <th>Ayah</th>
                            <th>Ibu</th>
                            <th>Nama Bayi</th>
                            <th>Jenis Kelamin</th>
                            <th>Tanggal Lahir</th>
                            <th>Tempat Lahir</th>
                            <th>No Akta</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($data as $index => $item)
                            <tr>
                                <td>{{ $data->firstItem() + $index }}</td>
                                <td>{{ $item->ayah->nama ?? '-' }}</td>
                                <td>{{ $item->ibu->nama ?? '-' }}</td>
                                <td>{{ $item->anak->nama ?? '-' }}</td>
                                <td>{{ $item->anak->jenis_kelamin ?? '-' }}</td>
                                <td>{{ $item->tgl_lahir }}</td>
                                <td>{{ $item->tempat_lahir }}</td>
                                <td>{{ $item->no_akta }}</td>
                                <td>
                                    <!-- Tombol Detail -->
                                    <a href="{{ route('peristiwa_kelahiran.show', $item->kelahiran_id) }}"
                                       class="btn btn-info btn-sm d-inline-flex align-items-center gap-1">
                                        <ion-icon name="eye-outline"></ion-icon> Detail
                                    </a>

                                    <!-- Tombol Edit -->
                                    <a href="{{ route('peristiwa_kelahiran.edit', $item->kelahiran_id) }}"
                                        class="btn btn-warning btn-sm d-inline-flex align-items-center gap-1">
                                        <ion-icon name="create-outline"></ion-icon> Edit
                                    </a>

                                    <!-- Tombol Hapus -->
                                    <form action="{{ route('peristiwa_kelahiran.destroy', $item->kelahiran_id) }}"
                                          method="POST" class="d-inline delete-form">
                                        @csrf
                                        @method('DELETE')
                                        <button type="button"
                                                class="btn btn-danger btn-sm btn-delete d-inline-flex align-items-center gap-1">
                                            <ion-icon name="trash-outline"></ion-icon> Hapus
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="9" class="text-center">Belum ada data kelahiran.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>

                <div class="d-flex justify-content-center mt-3">
                    {{ $data->links('pagination::bootstrap-4') }}
                </div>

            </div>
        </div>
    </div>
</div>

{{-- SweetAlert Hapus --}}
<script>
document.addEventListener('DOMContentLoaded', function () {
    const deleteButtons = document.querySelectorAll('.btn-delete');
    deleteButtons.forEach(button => {
        button.addEventListener('click', function () {
            const form = this.closest('form');
            Swal.fire({
                title: 'Yakin hapus?',
                text: "Data ini tidak dapat dikembalikan!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#d33',
                cancelButtonColor: '#3085d6',
                confirmButtonText: 'Ya, hapus!',
                cancelButtonText: 'Batal'
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
        title: 'Berhasil',
        text: '{{ session('success') }}',
        timer: 2000,
        showConfirmButton: false
    });
</script>
@endif

@endsection
