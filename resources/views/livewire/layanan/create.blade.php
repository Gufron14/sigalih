<div class="container">
    <div class="mt-5 mb-4">
        <div class="alert alert-light d-flex align-items-center" role="alert">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('layanan') }}">Layanan</a></li>
                    <li class="breadcrumb-item active" aria-current="page">{{ $surat->nama_surat }}</li>
                </ol>
            </nav>
          </div>
    </div>

    <div class="card">
        <div class="card-body">
            <form action="{{ route('layanan.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="mb-2">
                    <input type="hidden" name="id_surat" id="id_surat" class="form-control text-muted"
                        value="{{ $surat->id }}">
                    <h5 class="fw-bold">Pengajuan {{ $surat->nama_surat }}</h5>
                </div>
                <small class="mb-3 text-muted">{{ $surat->desc }}</small>
                <hr>
                <div class="mb-5 mt-3">
                    <label for="nik" class="form-label">NIK</label>
                    <input type="text" name="nik" id="nik" class="form-control" placeholder="Masukan NIK">
                </div>
                <button type="submit" class="btn btn-primary fw-bold">Kirim Pengajuan</button>
            </form>
        </div>
    </div>
</div>