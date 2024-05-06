@if (Request::is('/'))
    <nav class="navbar navbar-expand-lg" style="background-color: #b40000">
        <div class="container-fluid">
            <div class="text-white ms-3 fw-bold">
                <i class="fas fa-phone-alt"></i>&nbsp;&nbsp;081234567890
            </div>
            <div class="navbar-nav mx-auto mb-2 mb-lg-0">
                <marquee behavior="" direction="" class="text-white fw-bold">
                    PENGUMUMAN! Bagi para Warga Sirnagalih yang ingin membuat Surat Permohonan silakan Buat di
                    Website ini.
                </marquee>
            </div>
            <div class="text-white d-flex gap-3">
                <i class="fab fa-facebook-f"></i>
                <i class="fab fa-instagram"></i>
                <i class="fab fa-youtube"></i>
                <i class="fab fa-whatsapp"></i>
            </div>
        </div>
    </nav>
@endif

<!-- Navbar -->
@if (Request::is('banksampah/index'))
<nav class="navbar navbar-expand-lg bg-success" data-bs-theme="dark">
    <div class="container">
        <a class="navbar-brand fw-bold" href="#">Sampah Sigalih</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mx-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="#">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="#">Sampah</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="#">Riwayat</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="#">Home</a>
                </li>
            </ul>
            <a href="/" class="btn btn-outline-light fw-bold text-uppercase">website</a>
        </div>
    </div>
</nav>
@else
<nav class="navbar navbar-expand-lg navbar-light bg-body-tertiary">
    <!-- Container wrapper -->
    <div class="container">
        <!-- Navbar brand -->
        <a class="navbar-brand mt-2 mt-lg-0" href="#">
            <img src="{{ asset('assets/img/1.png') }}" height="40" alt="MDB Logo" loading="lazy" /> <span
                class="ms-3 fw-bold">Desa Sirnagalih</span>
        </a>
        <!-- Toggle button -->
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <!-- Collapsible wrapper -->
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <!-- Left links -->
            <ul class="navbar-nav mx-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link active fw-bold" aria-current="page" href="/">Beranda</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="warga/index">Warga</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="" role="button" data-bs-toggle="dropdown"
                        aria-expanded="false">
                        Tentang
                    </a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="/tentang">Sejarah</a></li>
                        <li><a class="dropdown-item" href="#">Wilayah</a></li>
                        {{-- <li><hr class="dropdown-divider"></li> --}}
                        <li><a class="dropdown-item" href="#">Monografi</a></li>
                        <li><a class="dropdown-item" href="#">Statistik</a></li>
                        <li><a class="dropdown-item" href="#">Potensi</a></li>
                    </ul>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                        aria-expanded="false">
                        Lembaga
                    </a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="#">Pemerintahan</a></li>
                        <li><a class="dropdown-item" href="#">BPD</a></li>
                        <li><a class="dropdown-item" href="#">LPM</a></li>
                        <li><a class="dropdown-item" href="#">Posyandu</a></li>
                        <li><a class="dropdown-item" href="#">PKK</a></li>
                        <li><a class="dropdown-item" href="#">Karang Taruna</a></li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a class="nav-link" aria-disabled="true">Pembangunan</a>
                </li>
            </ul>
            <!-- Left links -->
            <!-- Right elements -->
            <div class="d-flex align-items-center gap-2">
                <!-- Icon -->
                <a href="{{ route('layanan') }}" class="btn btn-outline-primary fw-bold">
                    <small>Layanan</small>
                </a>
                <a href="banksampah/index" class="btn btn-outline-success fw-bold">
                    <small>Bank Sampah</small>
                </a>
                |
                <!-- Avatar -->
                <div class="dropdown">
                    <a type="button" data-bs-toggle="dropdown" aria-expanded="false">

                            <i class="fas fa-user-circle fs-2 text-secondary"></i>
                        {{-- <img src="https://mdbcdn.b-cdn.net/img/new/avatars/2.webp" class="rounded-circle" height="32"
                            alt="Black and White Portrait of a Man" loading="lazy" /> --}}
                    </a>
                    <div class="dropdown-menu dropdown-menu-end" style="width: 240px">
                        <div class="text-center mb-3">
                            <div class="mt-3 mb-2">
                                <i class="fas fa-user-circle fs-1 text-secondary"></i>

                                {{-- <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-chat/ava2-bg.webp"
                                    class="rounded-circle img-fluid" style="width: 80px;" /> --}}
                            </div>
                            <div class="mb-3">
                                <h5 class="mb-3 fw-bold">
                                    Julie L. Arsenault <br>
                                        <small class="text-muted mb-4 fs-6">
                                            3205201403010002
                                        </small>
                                </h5>
                                    <a href="" class="btn btn-outline-primary"><small>Edit Profil</small></a>
                                    
                                    <form action="{{ url('api/user/logout') }}" method="POST">
                                        @csrf
                                        <button type="submit" class="btn btn-danger"><small>Logout</small></button>
                                    </form>
                                                                </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Right elements -->
        </div>
        <!-- Collapsible wrapper -->

    </div>
    <!-- Container wrapper -->
</nav>
    
@endif
<!-- Navbar -->
