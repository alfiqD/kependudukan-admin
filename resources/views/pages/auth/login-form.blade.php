<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Login Sistem Kependudukan — Premium</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <link rel="icon" href="/assets/admin/img/LOGO-aja.png">
  <link rel="shortcut icon" href="/assets/admin/img/LOGO-aja.png">

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css" rel="stylesheet">

  <style>
    body {
      background: #1E3C72;
      min-height: 100vh;
      display: flex;
      align-items: center;
      justify-content: center;
      padding: 30px;
      font-family: 'Segoe UI', sans-serif;
    }

    .login-wrapper {
      background: rgba(255,255,255,0.12);
      backdrop-filter: blur(14px);
      -webkit-backdrop-filter: blur(14px);
      border-radius: 20px;
      display: flex;
      overflow: hidden;
      width: 100%;
      max-width: 1100px;
      border: 1px solid rgba(255,255,255,0.2);
      box-shadow: 0 15px 35px rgba(0,0,0,0.25);
      animation: fadeIn 0.8s ease;
    }

    @keyframes fadeIn {
      from {opacity:0; transform:translateY(20px);} to {opacity:1; transform:translateY(0);}
    }

    .left-section {
      flex: 0 0 60%;
      position: relative;
      height: 600px;
      overflow: hidden;
    }

    .slideshow-container { position:absolute; inset:0; }

    .slide {
      position: absolute;
      inset: 0;
      width: 100%;
      height: 100%;
      object-fit: cover;
      object-position: center;
      opacity: 0;
      transition: opacity 1.2s ease-in-out;
    }

    .slide.active { opacity:1; }

    .left-caption {
      position: absolute;
      bottom: 30px;
      left: 30px;
      z-index: 5;
      color: white;
      text-shadow: 0 2px 6px rgba(0,0,0,.6);
    }

    .left-caption h3 { font-weight: 700; margin-bottom: 5px; }

    .left-caption p { width: 85%; font-size: 0.95rem; margin: 0; }

    .right-section {
      flex: 0 0 40%;
      padding: 50px 40px;
      color: #fff;
      display: flex;
      flex-direction: column;
      justify-content: center;
      background: rgba(255,255,255,0.05);
    }

    .form-control {
      background: rgba(255,255,255,0.15);
      border: 1px solid rgba(255,255,255,0.3);
      color: #fff;
      height: 48px;
      border-radius: 12px;
    }

    .form-control::placeholder { color: #e6e6e6; }

    .form-control:focus {
      border-color: #6BCBFF;
      box-shadow: 0 0 12px rgba(107,203,255,0.4);
    }

    .btn-premium {
      background: linear-gradient(135deg, #6BCBFF, #4A90E2);
      border: none;
      padding: 12px 0;
      border-radius: 12px;
      font-size: 16px;
      color: #fff;
      font-weight: 600;
      transition: 0.25s;
    }

    .btn-premium:hover {
      background: linear-gradient(135deg, #4A90E2, #1F65B8);
      box-shadow: 0 8px 18px rgba(0,0,0,0.25);
      transform: translateY(-2px);
    }

    .logo-login {
      width: 160px;
      display: block;
      margin: 0 auto 15px auto;
      border-radius: 14px;
      box-shadow: 0 0 18px rgba(255,255,255,0.35);
    }

    a { color:#6BCBFF; text-decoration:none; }
    a:hover { text-decoration:underline; }

    @media (max-width:992px) {
      .login-wrapper { flex-direction:column; }
      .left-section { height:350px; flex:unset; }
    }

    @media (max-width:768px) { .left-section{display:none;} }
  </style>
</head>

<body>
<div class="login-wrapper">

  <div class="left-section">
    <div class="slideshow-container">
      <img src="/media/slideshow/indonesia1.png" class="slide active" alt="">
      <img src="/media/slideshow/indonesia2.png" class="slide" alt="">
      <img src="/media/slideshow/indonesia3.png" class="slide" alt="">
    </div>

    <div class="left-caption">
      <h3>Pusat Data Kependudukan</h3>
      <p>Kelola data warga dan keluarga desa dengan mudah, cepat, dan aman.</p>
    </div>
  </div>

  <div class="right-section">
    <div class="text-center mb-4">
      <img src="/assets/admin/img/LOGO-kpnddkn.png" class="logo-login">
      <h3 class="fw-semibold">Login Sistem Kependudukan</h3>
    </div>

    @if ($errors->any())
    <div class="alert alert-danger">
      <ul class="m-0">
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
        <input type="text" name="username" class="form-control" placeholder="Masukkan username" value="{{ old('username') }}">
      </div>

      <div class="mb-3">
        <label class="form-label">Email</label>
        <input type="email" name="email" class="form-control" placeholder="Masukkan email" value="{{ old('email') }}">
      </div>

      <div class="mb-4">
        <label class="form-label">Password</label>
        <input type="password" name="password" class="form-control" placeholder="Masukkan password">
      </div>

      <button class="btn-premium w-100 mb-3" type="submit">Masuk</button>
    </form>

    <div class="text-center mt-2">
      Belum punya akun? <a href="/register">Registrasi di sini</a>
    </div>
  </div>
</div>

<script>
  document.addEventListener('DOMContentLoaded', function () {
    const slides = document.querySelectorAll('.slide');
    let current = 0;

    function nextSlide() {
      slides[current].classList.remove('active');
      current = (current + 1) % slides.length;
      slides[current].classList.add('active');
    }

    setInterval(nextSlide, 3500);
  });
</script>

</body>
</html>
