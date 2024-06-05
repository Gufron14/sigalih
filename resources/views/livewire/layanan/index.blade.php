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

    <div class="row row-cols-1 row-cols-md-4 g-4">
        @forelse ($surats as $surat)
            <div class="col">
                <div class="card-group card-grow color d-flex flex-column">
                    <a href="{{ route('createPermohonan', ['nama_surat' => $surat->nama_surat]) }}">
                        <div class="card card-bg shadow-sm p-2">
                            <div class="card-body d-flex flex-column justify-content-between">
                                <div class="mb-3">
                                    <h5 class="fw-bold">{{ $surat->nama_surat }}</h5>
                                    <small class="text-secondary">{!! Str::limit($surat->desc, 100)  !!}</small>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
        @empty
            <div class="mx-auto">
                <h5 class="text-center text-secondary">Layanan Administrasi saat ini belum tersedia. Coba lagi lain
                    hari.</h5>
            </div>
        @endforelse
    </div>
</div>
