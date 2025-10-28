<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
        <div class="sidebar-brand-icon">

            {{-- Logo Rumah --}}
            <i class="fas fa-home"></i>
        </div>
        <div class="sidebar-brand-text mx-3">Pusat Data Keluarga</div>
    </a>

    <hr class="sidebar-divider my-0">

    <li class="nav-item active">
        <a class="nav-link" href="{{ url('admin') }}">
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
        <a class="nav-link" href="{{ route('warga.index') }}">
            <i class="fas fa-id-card"></i>
            <span>Data Warga</span>
        </a>
    </li>

    <!-- Nav Item - Data User -->
    <li class="nav-item">
        <a class="nav-link" href="{{ route('users.index') }}">
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
        <a class="nav-link" href="{{ route('keluarga_kk.index') }}">
            <i class="fas fa-users"></i>
            <span>Data Kartu Keluarga </span>
        </a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">
    <div class="sidebar-heading">

        <div class="sidebar-heading">
            AUTENTIKASI
        </div>

        <li class="nav-item">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages"
                aria-expanded="true" aria-controls="collapsePages">
                <i class="fas fa-fw fa-folder"></i>
                <span>LOGIN & REGISTER</span>
            </a>
            <div id="collapsePages" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <h6 class="collapse-header">Login & Register</h6>
                    <a class="collapse-item" href="/auth">Login</a>
                    <a class="collapse-item" href="/register">Register</a>
                </div>
            </div>
        </li>


        <hr class="sidebar-divider d-none d-md-block">

        <div class="text-center d-none d-md-inline">
            <button class="rounded-circle border-0" id="sidebarToggle"></button>
        </div>



</ul>
