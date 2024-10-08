@if (Request::is('/'))
    {{-- <nav class="navbar navbar-expand-lg" style="background-color: #b40000">
        <div class="container-fluid">
            <div class="text-white ms-3 fw-bold">
                <a href="https://wa.me/+6281234567890" class="text-white">
                    <i class="fas fa-phone-alt me-2"></i>081234567890
                </a>
            </div>
            <div class="navbar-nav mx-auto mb-2 mb-lg-0">
                <marquee behavior="" direction="" class="text-white fw-bold">
                    PENGUMUMAN! Bagi para Warga Sirnagalih yang ingin membuat Surat Permohonan silakan buat di
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
    </nav> --}}
@endif


{{-- WEBSITE NAVBAR --}}
{{--  --}}
<nav class="navbar navbar-expand-lg sticky-top shadow-sm navbar-light bg-body-tertiary">
    <!-- Container wrapper -->
    <div class="container">
        <!-- Navbar brand -->
        <a class="navbar-brand mt-2 mt-lg-0" href="/">
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
                <x-nav-link :active="request()->routeIs('berita')" href="{{ route('berita') }}">Kabar Desa</x-nav-link>
                <x-nav-link :active="request()->routeIs('dana-desa')" href="{{ route('dana-desa') }}">Transparansi</x-nav-link>
                {{-- Pembangunan <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                        data-bs-toggle="dropdown" aria-expanded="false">
                        Pembangunan
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item" href="{{ route('layanan') }}">Perencanaan</a></li>
                        <li><a class="dropdown-item" href="{{ route('dana-desa') }}">Transparansi</a></li>
                    </ul>
                </li>--}}
                {{-- Tentang --}}
                {{-- <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                        data-bs-toggle="dropdown" aria-expanded="false">
                        Tentang
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item" href="{{ route('sejarah') }}">Sejarah Sirnagalih</a></li>
                        <li><a class="dropdown-item" href="">Wilayah</a></li>
                        <li><a class="dropdown-item" href="">Statistik</a></li>
                        <li><a class="dropdown-item" href="">BPD</a></li>
                        <li><a class="dropdown-item" href="">Prestasi</a></li>
                        <li><a class="dropdown-item" href="">Budaya</a></li>
                        <li><a class="dropdown-item" href="">Kemasyarakatan</a></li>
                    </ul>
                </li> --}}
                {{-- <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                        data-bs-toggle="dropdown" aria-expanded="false">
                        Aplikasi
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item" href="{{ route('layanan') }}">Layanan Surat</a></li>
                        <li><a class="dropdown-item" href="{{ route('bankSampah') }}">Bank Sampah</a></li>
                    </ul>
                </li> --}}
                <x-nav-link :active="request()->routeIs('layanan')" href="{{ route('layanan') }}">Layanan</x-nav-link>
                <x-nav-link :active="request()->routeIs('bankSampah')" href="{{ route('bankSampah') }}">Bank Sampah</x-nav-link>
            </ul>
            <!-- Left links -->
            <!-- Right elements -->
            <div class="d-flex align-items-center gap-3">
                @if (Auth::check())
                {{-- <i class="fas fa-bell fs-4 text-danger"></i> --}}
                    <div class="dropdown">
                        <div data-bs-toggle="dropdown" aria-expanded="false">
                            @if (Auth::user()->avatar)
                                <img src="{{ Storage::url(Auth::user()->avatar) }}" alt="tst" class="object-fit-cover rounded-circle"
                                width="36px" height="36px">
                            @else
                            <img src="https://ui-avatars.com/api/?name={{ auth()->user()->warga->nama }}" class="img-thumbnail rounded-circle" alt="" width="40px">

                            @endif
                        </div>
                        <ul class="dropdown-menu shadow dropdown-menu-end">
                            <li>
                                <a class="dropdown-item text-dark" href="{{ route('profil') }}">
                                    Edit Profil
                                </a>
                            </li>
                            <li>
                                @livewire('auth.logout')
                            </li>
                        </ul>
                    </div>
                @else
                    <a class="btn btn-danger rounded-3 text-white fw-bold" href="{{ route('login') }}">Login</a>
                @endif


                {{-- @livewire('auth.auth-link') --}}
            </div>
            <!-- Right elements -->
        </div>
        <!-- Collapsible wrapper -->
    </div>
    <!-- Container wrapper -->
</nav>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script>
