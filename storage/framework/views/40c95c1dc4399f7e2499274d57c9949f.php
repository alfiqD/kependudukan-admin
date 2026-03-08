<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Login Berhasil — Premium</title>

    <link rel="icon" href="/assets/admin/img/LGO_Atas.png">
    <link rel="shortcut icon" href="/assets/admin/img/LGO_Atas.png">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css" rel="stylesheet">

    <style>
        body {
            background: #1E3C72;
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            font-family: 'Segoe UI', sans-serif;
        }

        .card-premium {
            background: rgba(255, 255, 255, 0.15);
            backdrop-filter: blur(14px);
            -webkit-backdrop-filter: blur(14px);
            border-radius: 1.5rem;
            padding: 3rem 2.5rem;
            box-shadow: 0 15px 35px rgba(0,0,0,0.25);
            width: 100%;
            max-width: 520px;
            color: #fff;
            border: 1px solid rgba(255,255,255,0.25);
            animation: fadeIn 1s ease;
        }

        @keyframes fadeIn {
            from {opacity: 0; transform: translateY(20px);}
            to {opacity: 1; transform: translateY(0);}
        }

        .success-icon {
            font-size: 4.5rem;
            color: #78FFDA;
            text-shadow: 0 0 20px rgba(120,255,218,0.7);
            margin-bottom: 1.3rem;
        }

        .list-group-item {
            background-color: rgba(255,255,255,0.1);
            border: none;
            color: #fff;
            padding: 14px 18px;
            border-radius: 12px;
            margin-bottom: 10px;
            backdrop-filter: blur(4px);
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

        .btn-group-premium {
            display: flex;
            gap: 12px;
            margin-top: 25px;
        }

    </style>
</head>
<body>

<div class="card-premium">
    <div class="success-icon text-center">
        <i class="bi bi-check-circle-fill"></i>
    </div>

    <h3 class="mb-3 text-center fw-bold">Login Berhasil!</h3>
    <p class="text-center mb-4">
    Selamat datang <b><?php echo e(auth()->user()->name); ?></b>
</p>

<ul class="list-group mb-4">
    <li class="list-group-item">
        👤 Username: <?php echo e(auth()->user()->name); ?>

    </li>
    <li class="list-group-item">
        📧 Email: <?php echo e(auth()->user()->email); ?>

    </li>
</ul>


    <div class="btn-group-premium">
        <a href="/auth" class="btn btn-premium w-50"><i class="bi bi-arrow-left-circle me-2"></i>Kembali</a>
        <a href="/admin" class="btn btn-premium w-50"><i class="bi bi-speedometer2 me-2"></i>Dashboard</a>
    </div>
</div>

</body>
</html>
<?php /**PATH C:\Alyah2SIB\laragon-6.0-minimal\www\kependudukan-admin\resources\views/pages/auth/success.blade.php ENDPATH**/ ?>