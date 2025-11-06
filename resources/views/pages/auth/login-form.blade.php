<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Login Sistem Kependudukan</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Bootstrap & Icons -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css" rel="stylesheet">

  <style>
    body {
      background: linear-gradient(135deg, #4A90E2, #50E3C2);
      min-height: 100vh;
      display: flex;
      align-items: center;
      justify-content: center;
      font-family: 'Segoe UI', sans-serif;
      margin: 0;
      padding: 20px;
    }

    .login-container {
      display: flex;
      flex-wrap: wrap;
      background-color: #fff;
      border-radius: 1rem;
      overflow: hidden;
      box-shadow: 0 0.5rem 1rem rgba(0, 0, 0, 0.15);
      max-width: 900px;
      width: 100%;
    }

    /* BAGIAN KIRI */
    .left-section {
      flex: 1;
      background: linear-gradient(135deg, #4A90E2, #50E3C2);
      color: white;
      display: flex;
      flex-direction: column;
      justify-content: center;
      align-items: center;
      padding: 3rem 2rem;
      text-align: center;
    }

    .left-section img {
      width: 80%;
      max-width: 240px;
      margin-bottom: 1.5rem;
    }

    .left-section h4 {
      font-weight: 600;
      margin-top: 1rem;
    }

    .left-section p {
      font-size: 0.95rem;
      opacity: 0.9;
    }

    /* BAGIAN KANAN */
    .right-section {
      flex: 1;
      padding: 3rem 2.5rem;
      display: flex;
      flex-direction: column;
      justify-content: center;
    }

    .icon-header {
      font-size: 3rem;
      color: #50E3C2;
      margin-bottom: 0.5rem;
    }

    .form-control:focus {
      border-color: #4A90E2;
      box-shadow: 0 0 0 0.2rem rgba(74, 144, 226, 0.25);
    }

    .btn-primary {
      background-color: #4A90E2;
      border-color: #4A90E2;
      transition: 0.3s;
    }

    .btn-primary:hover {
      background-color: #357ABD;
      border-color: #357ABD;
    }

    .text-center a {
      color: #4A90E2;
      text-decoration: none;
      font-weight: 500;
    }

    .text-center a:hover {
      text-decoration: underline;
    }

    /* RESPONSIVE */
    @media (max-width: 768px) {
      .left-section {
        display: none;
      }
      .right-section {
        width: 100%;
      }
    }

    /* Aturan untuk logo di halaman login */
.logo-login {
  width: 190px; /* Atur lebar sesuai keinginan Anda. Contoh: 180px */
  height: auto; /* Biarkan tinggi menyesuaikan secara otomatis agar gambar tidak gepeng */
  margin-bottom: -10px; /* Opsional: tambahkan sedikit jarak di bawah logo */
}

/* Jika Anda ingin logo berada di tengah */
.text-center img.logo-login { /* Pastikan selektornya spesifik jika ada .text-center di atasnya */
  display: block; /* Agar margin auto bisa bekerja */
  margin-left: auto;
  margin-right: auto;
}
  </style>



</head>

<body>

  <div class="login-container">
    <!-- Bagian kiri -->
    <div class="left-section">
      <img src="https://cdn-icons-png.flaticon.com/512/906/906175.png" alt="Ilustrasi Penduduk">
      <h4>Pusat Data Kependudukan</h4>
      <p>Kelola data warga dan keluarga desa dengan mudah, cepat, dan aman.</p>
    </div>

    <!-- Bagian kanan -->
    <div class="right-section">
      <div class="text-center mb-4">
        <img src="/assets/admin/img/logo-kependudukan2.jpg" alt="Logo Sistem Kependudukan" class="logo-login">
        <h3 class="fw-semibold">Login Sistem Kependudukan</h3>
      </div>

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
          <label class="form-label">Username</label>
          <input type="text" name="username" class="form-control" value="{{ old('username') }}" placeholder="Masukkan username">
        </div>

        <div class="mb-3">
          <label class="form-label">Email</label>
          <input type="email" name="email" class="form-control" value="{{ old('email') }}" placeholder="Masukkan email">
        </div>

        <div class="mb-4">
          <label class="form-label">Password</label>
          <input type="password" name="password" class="form-control" placeholder="Masukkan password">
        </div>

        <button class="btn btn-primary w-100 mb-3" type="submit">Masuk</button>
      </form>

      <div class="text-center mt-2">
        <p>Belum punya akun? <a href="/register">Registrasi di sini</a></p>
      </div>
    </div>
  </div>

</body>
</html>
