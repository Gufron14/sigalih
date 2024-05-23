<div class="container mt-5">

    @if (session()->has('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    <div class="row justify-content-between mb-5">
        <div class="col">
            <h4 class="fw-bold">Layanan</h4>
        </div>
        <div class="col d-flex align-items-center justify-content-end">
            <form class="d-flex w-100" role="search">
                <input class="form-control me-2" type="search" placeholder="Cari layanan" aria-label="Search">
                <button class="btn btn-outline-success" type="submit">Cari</button>
            </form>
        </div>
    </div>

    <div class="row row-cols-1 row-cols-md-4 g-5">
        @forelse ($surats as $surat)
            <div class="col">
                <div class="card-group card-grow d-flex flex-column h-100">
                    <div class="card shadow h-100">
                        <img src="https://pict.sindonews.net/dyn/850/pena/news/2021/09/25/40/550692/desadesa-di-china-ini-bayar-pasangan-untuk-punya-banyak-anak-dbu.jpg"
                        class="card-img-top" alt="...">
                        <div class="card-body d-flex flex-column justify-content-between">
                            <div class="mb-3">
                                <h5 class="fw-bold">{{ $surat->nama_surat }}</h5>
                                {{-- <small class="text-secondary">{{ $surat->desc }}</small> --}}
                            </div>
                            <a href="{{ route('createSurat', ['id' => $surat->id]) }}" class="btn btn-primary fw-bold w-100 mt-auto">Buat Permohonan</a>
                        </div>
                    </div>
                </div>
            </div>
        @empty
            <div class="card mx-auto">
                <div class="card-body">
                    <h6 class="text-center">Layanan saat ini belum tersedia. Coba lagi lain hari.</h6>
                </div>
            </div>
        @endforelse
    </div>
</div>
