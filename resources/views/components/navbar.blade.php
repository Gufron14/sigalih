@if (Request::is('/'))
    <nav class="navbar navbar-expand-lg" style="background-color: #b40000">
        <div class="row align-items-center justify-content-center">
            <div class="col-2 text-white">
                <h5 class="fw-bold">PENGUMUMAN</h5>
            </div>
            <div class="col-7">
                <marquee behavior="" direction="" class="text-white fw-bold text-uppercase">Lorem ipsum dolor sit
                    amet,
                    consectetur adipisicing elit. Nesciunt, esse officia voluptas distinctio dolores aliquid eos ut
                    veniam
                    maiores est labore amet suscipit praesentium obcaecati voluptatibus placeat at vero temporibus atque
                    repudiandae. Repellendus distinctio excepturi aut ratione reiciendis ut facere! Eos, beatae.
                    Eligendi,
                    ipsa molestias laudantium laboriosam odio porro eaque!</marquee>
            </div>
            <div class="col-2 text-white">
                Hubungi Kami
            </div>
        </div>
    </nav>
@endif

<nav class="navbar navbar-expand-lg bg-body-tertiary">
    <div class="container">
        <a class="navbar-brand d-inline-flex" href="#">
            <img src="{{ asset('assets/img/1.png') }}" class="me-3" alt="logo" style="width: 60px;">
            <div>
                <div class="fw-bold">DESA SIRNAGALIH</div>
                <small class="text-secondary">ᮓᮨᮞᮃ ᮞᮤᮁᮔᮃᮌᮃᮜᮤᮂ</small>
            </div>
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mx-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link active text-uppercase fw-bold" aria-current="page" href="/">Beranda</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-uppercase" href="warga/index">Warga</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle text-uppercase" href="" role="button"
                        data-bs-toggle="dropdown" aria-expanded="false">
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
                    <a class="nav-link dropdown-toggle text-uppercase" href="#" role="button"
                        data-bs-toggle="dropdown" aria-expanded="false">
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
                    <a class="nav-link text-uppercase" aria-disabled="true">Pembangunan</a>
                </li>
            </ul>
            <div class="gap-5">
                <a href="/layanan/index" class="btn btn-warning fw-bold text-uppercase">Layanan Online</a>
                <a href="/banksampah/index" class="btn btn-success fw-bold text-uppercase">Bank Sampah</a>
            </div>
        </div>
    </div>
</nav>
