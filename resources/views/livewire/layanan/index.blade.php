<div class="mt-5">
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

    <div class="row row-cols-1 row-cols-md-3 g-4">
        @forelse ($surats as $surat)
            <div class="col">
                <div class="card-group card-grow d-flex flex-column h-100">
                    <div class="card mb-3">
                        <div class="card-body">
                            <div class="">
                                <h5 class="fw-bold">{{ $surat->nama_surat }}</h5>
                                <small class="text-muted">{{ $surat->desc }}</small>
                            </div>
                        </div>
                        <div class="card-footer">
                            <a href="{{ route('create.surat', ['id' => $surat->id]) }}"
                                class="btn btn-primary fw-bold ">Ajukan Surat</a>
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
