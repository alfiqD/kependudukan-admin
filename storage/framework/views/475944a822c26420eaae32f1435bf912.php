<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Login Berhasil</title>
    
    <link rel="icon" href="/assets/admin/img/favicon32.png">
    <link rel="shortcut icon" href="/assets/admin/img/favicon32.png">
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
        }
        .card {
            border-radius: 1rem;
            padding: 2.5rem;
            box-shadow: 0 0.5rem 1rem rgba(0,0,0,0.2);
            background-color: #fff;
            text-align: center;
            max-width: 500px;
            width: 100%;
        }
        .success-icon {
            font-size: 4rem;
            color: #50E3C2;
            margin-bottom: 1rem;
            animation: bounce 1s;
        }
        @keyframes bounce {
            0%, 20%, 50%, 80%, 100% {transform: translateY(0);}
            40% {transform: translateY(-15px);}
            60% {transform: translateY(-7px);}
        }
        .list-group-item {
            font-size: 16px;
            padding: 12px 18px;
            border: none;
            border-bottom: 1px solid #eee;
        }
        .list-group-item:last-child {
            border-bottom: none;
        }
        .btn-group {
            display: flex;
            justify-content: space-between;
            gap: 10px;
            margin-top: 20px;
        }
        .btn-primary {
            background-color: #4A90E2;
            border-color: #4A90E2;
        }
        .btn-primary:hover {
            background-color: #357ABD;
            border-color: #357ABD;
        }
    </style>

</head>
<body>

<div class="card shadow-lg">
    <div class="success-icon">
        <i class="bi bi-check-circle-fill"></i>
    </div>
    <h3 class="mb-3">Login Berhasil!</h3>
    <p>Selamat datang <b><?php echo e($username); ?></b>, berikut data login kamu:</p>

    <ul class="list-group mb-4 mt-3">
        <li class="list-group-item">👤 Username: <?php echo e($username); ?></li>
        <li class="list-group-item">📧 Email: <?php echo e($email); ?></li>
        
    </ul>

    <div class="btn-group">
        <a href="/auth" class="btn btn-primary w-50">
            <i class="bi bi-arrow-left-circle me-2"></i> Kembali ke Login
        </a>
        <a href="/admin" class="btn btn-primary w-50">
            <i class="bi bi-speedometer2 me-2"></i> Masuk ke Dashboard
        </a>
    </div>
</div>

</body>
</html>
<?php /**PATH C:\alfiqlaravel\laragon-6.0-minimal\www\kependudukan-admin\resources\views/pages/auth/success.blade.php ENDPATH**/ ?>