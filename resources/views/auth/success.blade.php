<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Login Berhasil</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .login-success-card {
            max-width: 450px;   /* biar lebih ramping */
            margin: 50px auto;  /* biar ke tengah dan ada jarak atas */
            padding: 30px;
        }
        .list-group-item {
            padding: 12px 18px;
            font-size: 16px;
        }
    </style>
</head>
<body class="bg-light">

<div class="container">
    <div class="card login-success-card shadow-lg border-0">
        <div class="alert alert-success text-center mb-4">
            <h3>Login Berhasil!</h3>
            <p>Selamat datang <b>{{ $username }}</b>, berikut data login kamu:</p>
        </div>

        <ul class="list-group mb-4">
            <li class="list-group-item">👤 Username: {{ $username }}</li>
            <li class="list-group-item">📧 Email: {{ $email }}</li>
            <li class="list-group-item">🔑 Password: {{ $password }}</li>
        </ul>

        <div class="d-flex justify-content-between">
            <a href="/auth" class="btn btn-outline-danger">
                Kembali ke Login
            </a>
            <a href="/admin" class="btn btn-primary">
                Masuk ke Dashboard
            </a>
        </div>
    </div>
</div>

</body>
</html>
