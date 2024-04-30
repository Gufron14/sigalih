<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
        <img src="{{ asset('adminlte/dist/img/AdminLTELogo.png') }}" alt="AdminLTE Logo"
            class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-bold">SIGALIH</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="{{ asset('adminlte/dist/img/user2-160x160.jpg') }}" class="img-circle elevation-2"
                    alt="User Image">
            </div>
            <div class="info">
                <a href="#" class="d-block">Alexander Pierce</a>
            </div>
        </div>

        <!-- SidebarSearch Form -->
        <div class="form-inline">
            <div class="input-group" data-widget="sidebar-search">
                <input class="form-control form-control-sidebar" type="search" placeholder="Search"
                    aria-label="Search">
                <div class="input-group-append">
                    <button class="btn btn-sidebar">
                        <i class="fas fa-search fa-fw"></i>
                    </button>
                </div>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                data-accordion="false">

                {{-- DASHBOARD --}}
                <li class="nav-item">
                    <a href="/admin/dashboard" class="nav-link">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>Dashboard</p>
                    </a>
                </li>

                {{-- SURAT  --}}
                <li class="nav-header">LAYANAN SURAT</li>
                <li class="nav-item">
                    <a href="{{ route('jenis-surat') }}" class="nav-link">
                        <i class="nav-icon fas fa-envelope-open-text"></i>
                        <p>Jenis Surat</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('surat') }}" class="nav-link">
                        <i class="nav-icon fas fa-envelope"></i>
                        <p>Pengajuan Surat
                        </p>
                        <span class="badge badge-success right">1</span>
                    </a>
                </li>

                {{--  --}}
                <li class="nav-header">KEPENDUDUKAN</li>
                <li class="nav-item">
                    <a href="{{ route('warga') }}" class="nav-link">
                        <i class="nav-icon fas fa-users"></i>
                        <p>Data Warga</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('surat') }}" class="nav-link">
                        <i class="nav-icon fas fa-user-friends"></i>
                        <p>Data User</p>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
