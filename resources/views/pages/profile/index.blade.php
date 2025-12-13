@extends('layouts.admin.app')

@section('content')
<div class="container-fluid">

    <h1 class="h3 mb-4 text-gray-800">Profil Pengguna</h1>

    {{-- Alert sukses --}}
    @if (session('success'))
        <div class="alert alert-success alert-dismissible fade show">
            {{ session('success') }}
            <button type="button" class="close" data-dismiss="alert">&times;</button>
        </div>
    @endif

    <div class="row justify-content-center">
        <div class="col-lg-8">

            <div class="card shadow mb-4">
                <div class="card-body">

                    <div class="row align-items-center">

                        {{-- FOTO PROFIL --}}
                        <div class="col-md-4 text-center mb-3 mb-md-0">
                            <img src="{{ $user->profile_picture
                                    ? asset('storage/' . $user->profile_picture)
                                    : asset('images/default-avatar.png') }}"
                                 class="rounded-circle img-thumbnail"
                                 width="160"
                                 height="160"
                                 alt="Foto Profil">

                            <h5 class="mt-3 mb-0 font-weight-bold">
                                {{ $user->name }}
                            </h5>
                            <small class="text-muted text-capitalize">
                                {{ $user->role }}
                            </small>
                        </div>

                        {{-- DATA USER --}}
                        <div class="col-md-8">
                            <table class="table table-borderless mb-3">
                                <tr>
                                    <th width="140">Nama</th>
                                    <td>: {{ $user->name }}</td>
                                </tr>
                                <tr>
                                    <th>Email</th>
                                    <td>: {{ $user->email }}</td>
                                </tr>
                                <tr>
                                    <th>Role</th>
                                    <td>: {{ ucfirst($user->role) }}</td>
                                </tr>
                            </table>

                            <div class="text-right">
                                <a href="{{ route('users.edit', $user) }}"
                                   class="btn btn-primary">
                                    <i class="fas fa-edit mr-1"></i>
                                    Edit Profil
                                </a>
                            </div>
                        </div>

                    </div>

                </div>
            </div>

        </div>
    </div>

</div>
@endsection
