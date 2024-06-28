<div class="container p-5">
    <h3 class="fw-bold mb-5">Transparansi APB Desa</h3>

    <div class="row gap-5">
        <div class="col" height="600px">
            <div id="carouselDanaDesa" class="carousel slide" data-bs-ride="carousel">
                <div class="carousel-inner">
                    @forelse ($transparansis as $item)
                        <div class="carousel-item @if ($loop->first) active @endif">
                                <img src="{{ Storage::url($item->infografik) }}" height="360px" class="w-100" alt="{{ $item->keterangan }}">
                                {{-- <div class="carousel-caption d-none d-md-block">
                                    <h5 class="fw-bold">{{ $item->keterangan }}</h5>
                                    <p>Tahun : {{ $item->tahun }}</p>
                                </div> --}}
                        </div>
                    @empty
                        <div class="carousel-item active">
                            <img src="{{ asset('images/no-image.png') }}" class="d-block w-100" alt="No Image">
                            <div class="carousel-caption d-none d-md-block">
                                <h5>Tidak ada data</h5>
                            </div>
                        </div>
                    @endforelse
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#carouselDanaDesa" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselDanaDesa" data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
            </div>
            
        </div>
        <div class="col-4">
            <h5 class="mb-3">Download Laporan APB Desa</h5>
            @forelse ($transparansis as $item)
                <a href="{{ Storage::url($item->dokumen) }}" target="_blank" download>
                    <div class="card mb-3 shadow-sm card-grow">
                        <div class="card-body p-3 d-flex justify-content-between align-items-center">
                            <div>
                                <h5 class="fw-bold">{{ $item->keterangan }}</h5>
                                <small>Tahun : {{ $item->tahun }}</small>
                            </div>
                        </div>
                    </div>
                </a>
            @empty
                <p>Data belm tersedia</p>
            @endforelse
        </div>
    </div>

</div>
