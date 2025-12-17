<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
        <div class="sidebar-brand-icon">
            <img src="/assets/admin/img/LGO.png" alt="Logo" class="logo-login">
        </div>
    </a>


    <hr class="sidebar-divider my-0">

    <li class="nav-item active">
        <a class="nav-link" href="<?php echo e(url('admin')); ?>">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">


    <div class="sidebar-heading">
        Data
    </div>


    <!-- Nav Item - Data Warga -->
    <li class="nav-item">
        <a class="nav-link" href="<?php echo e(route('warga.index')); ?>">
            <i class="fas fa-id-card"></i>
            <span>Data Warga</span>
        </a>
    </li>

    <!-- Nav Item - Data User -->
    <li class="nav-item">
        <a class="nav-link" href="<?php echo e(route('users.index')); ?>">
            <i class="fas fa-user"></i>
            <span>Data User</span>
        </a>
    </li>

    <hr class="sidebar-divider">

    <div class="sidebar-heading">
        Kependudukan
    </div>
    <!-- Menu Data Keluarga KK -->
    <li class="nav-item">
        <a class="nav-link" href="<?php echo e(route('keluarga_kk.index')); ?>">
            <i class="fas fa-address-card"></i>
            <span>Data Kartu Keluarga </span>
        </a>
    </li>

    <li class="nav-item">
        <a class="nav-link" href="<?php echo e(route('anggota_keluarga.index')); ?>">
            <i class="fas fa-users"></i>
            <span>Data Anggota Keluarga </span>
        </a>
    </li>

    <li class="nav-item">
        <a class="nav-link" href="<?php echo e(route('peristiwa_kelahiran.index')); ?>">
            <i class="fas fa-baby"></i>
            <span>Data Peristiwa Kelahiran </span>
        </a>
    </li>

    <li class="nav-item">
        <a class="nav-link" href="<?php echo e(route('peristiwa_kematian.index')); ?>">
            <i class="fas fa-skull-crossbones"></i>
            <span>Data Peristiwa Kematian</span>
        </a>
    </li>

    <li class="nav-item">
        <a class="nav-link" href="<?php echo e(route('peristiwa_pindah.index')); ?>">
            <i class="fas fa-truck-moving"></i>
            <span>Data Peristiwa Pindah</span>
        </a>
    </li>

    

    <!-- Divider -->
    <hr class="sidebar-divider">


    <div class="sidebar-heading">
        AUTENTIKASI
    </div>

    <li class="nav-item">
    <a class="nav-link" href="/auth">
        <i class="fas fa-sign-out-alt"></i>  <!-- Icon logout lebih sesuai -->
        <span>Logout</span>
    </a>
</li>

<li class="nav-item">
    <a class="nav-link" href="/register">
        <i class="fas fa-user-plus"></i>  <!-- Icon register/user tambah -->
        <span>Register</span>
    </a>
</li>


    


    <hr class="sidebar-divider d-none d-md-block">

    <li class="nav-item">
        <a class="nav-link" href="<?php echo e(route('profile.pengembang')); ?>">
            <i class="fas fa-user-cog"></i>
            <span>Profile Pengembang </span>
        </a>
    </li>

    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>



</ul>
<?php /**PATH C:\alfiqlaravel\laragon-6.0-minimal\www\kependudukan-admin\resources\views/layouts/admin/sidebar.blade.php ENDPATH**/ ?>