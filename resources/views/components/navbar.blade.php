<nav class="navbar navbar-expand-lg bg-body-tertiary">
    <div class="container">
        <a class="navbar-brand fw-bold" href="#">
            <img src="{{ asset('assets/img/1.png') }}" class="me-3" alt="logo" style="width: 40px;">
            DESA SIRNAGALIH
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mx-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="/">Beranda</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/berita">Kabar Desa</a>
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
        </div>
        <div class="gap-5">
            <button class="btn btn-warning fw-bold">Layanan Online</button>
            <button class="btn btn-success fw-bold">Bank Sampah Desa</button>
        </div>
    </div>
</nav>
