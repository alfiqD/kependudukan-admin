<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<div class="container mt-5">
    <div class="card shadow p-4 w-50 mx-auto">
        <h3 class="text-center">Login Sistem Kependudukan</h3>

        <!-- Error Message -->
            <!-- Error Message -->
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form method="POST" action="/auth/login">
        @csrf
        <div class="mb-3">
            <label>Username</label>
            <input type="text" name="username" class="form-control" value="{{ old('username') }}">
        </div>
        <div class="mb-3">
            <label>Email</label>
            <input type="email" name="email" class="form-control" value="{{ old('email') }}">
        </div>
        <div class="mb-3">
            <label>Password</label>
            <input type="password" name="password" class="form-control">
        </div>

        <button class="btn btn-primary w-100">Masuk</button>
    </form>

    <div class="text-center mt-3">
        <p>Belum punya akun?
            <a href="/register" class="text-decoration-none">Registrasi di sini</a>
        </p>
    </div>
</div>

</body>
</html>
