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

{{-- BANK SAMPAH NAVBAR --}}
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

{{-- WEBSITE NAVBAR --}}
{{--  --}}
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
                <x-nav-link :active="request()->routeIs('home')" href="/">Beranda</x-nav-link>
                <x-nav-link :active="request()->routeIs('berita*')" href="{{ route('berita') }}" >Kabar Desa</x-nav-link>
                <x-nav-link :active="request()->routeIs('tentang')" href="/" >Tentang</x-nav-link>
                <x-nav-link :active="request()->routeIs('tentang')" href="/" >Lembaga</x-nav-link>
                <x-nav-link :active="request()->routeIs('tentang')" href="/" >Pembangunan</x-nav-link>
            </ul>
            <!-- Left links -->
            <!-- Right elements -->
            <div class="d-flex align-items-center gap-3">
                <!-- Icon -->
                <div>
                    <a href="{{ route('layanan') }}" class="btn btn-warning fw-bold">
                        Layanan
                    </a>
                    <a href="banksampah/index" class="btn btn-success fw-bold">
                        Bank Sampah
                    </a>
                </div>
                {{-- @livewire('auth.auth-link') --}}
            </div>
            <!-- Right elements -->
        </div>
        <!-- Collapsible wrapper -->
    </div>
    <!-- Container wrapper -->
</nav>
    
@endif
<!-- Navbar -->
