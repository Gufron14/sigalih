<div class="container p-4 mb-4">
    <nav class="navbar navbar-expand-lg rounded-4 p-2" data-bs-theme="dark" style="background-image: linear-gradient(to right, #0a9659 0%, #3cba53 100%);">
        <div class="container">
            <a class="navbar-brand fw-bold" href="#"> <i class="fas fa-recycle"></i></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
    
    
    
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto gap-2 mb-2 mb-lg-0">
                    <x-nav-link :active="request()->routeIs('bankSampah')" href="{{ route('bankSampah') }}">Beranda</x-nav-link>
                    <x-nav-link :active="request()->routeIs('tukarSaldo')" href="{{ route('tukarSaldo') }}" >Tukar Saldo</x-nav-link>
                    <x-nav-link :active="request()->routeIs('riwayat')" href="{{ route('riwayat') }}" >Riwayat</x-nav-link>
                    <x-nav-link :active="request()->routeIs('panduan')" href="{{ route('panduan') }}" >Panduan</x-nav-link>
                </ul>
                <div class="navbar-nav d-flex gap-3 align-items-center text-white">
                    <i class="fas fa-bell fs-5"></i>
                    <i class="fas fa-sign-out-alt fs-5"></i> |
                    <a href="/" class="btn btn-light fw-bold rounded-4 text-success">Website<i class="bi bi-arrow-right-circle-fill ms-2"></i></a>
                </div>
            </div>
        </div>
    </nav>
</div>
