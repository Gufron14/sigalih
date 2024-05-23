<nav class="navbar navbar-expand-lg bg-success" data-bs-theme="dark">
    <div class="container">
        <a class="navbar-brand fw-bold" href="#"> <i class="fas fa-recycle"></i> &nbsp; Sampah Sigalih</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>



        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mx-auto gap-2 mb-2 mb-lg-0">
                <x-nav-link :active="request()->routeIs('bankSampah')" href="{{ route('bankSampah') }}">Beranda</x-nav-link>
                <x-nav-link :active="request()->routeIs('tukarSaldo')" href="{{ route('tukarSaldo') }}" >Tukar Saldo</x-nav-link>
                <x-nav-link :active="request()->routeIs('riwayat')" href="{{ route('riwayat') }}" >Riwayat</x-nav-link>
                <x-nav-link :active="request()->routeIs('panduan')" href="{{ route('panduan') }}" >Panduan</x-nav-link>
            </ul>
            <div class="navbar-nav d-flex gap-3 align-items-center text-white">
                <i class="fas fa-bell fs-5"></i>
                <i class="fas fa-sign-out-alt fs-5"></i> |
                <a href="/" class="btn btn-outline-light fw-bold">Website</a>
            </div>
        </div>
    </div>
</nav>
