<div class="container w-50">

    @if (session()->has('message'))
        <div class="alert alert-success mt-5">{{ session('message') }}</div>
    @endif

    @if (session()->has('error'))
        <div class="alert alert-danger mt-5">{{ session('error') }}</div>
    @endif

    <div class="d-flex justify-content-center mt-5 mb-3">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('layanan') }}">Layanan</a></li>
                <li class="breadcrumb-item active fw-bold" aria-current="page">{{ $surat->nama_surat }}</li>
            </ol>
        </nav>
    </div>

    <div class="card shadow mx-auto">
        <div class="card-body p-5">
            <form wire:submit.prevent="store" enctype="multipart/form-data">
                <div class="mb-2">
                    <input type="hidden" wire:model="id_surat" class="form-control text-muted"
                        value="{{ $surat->id }}">
                    <h3 class="fw-bold">Permohonan {{ $surat->nama_surat }}</h3>
                </div>

                <p class="mb-3 text-muted">{{ $surat->desc }}</p>

                <hr class="my-4">

                <div class="mb-4">
                    <label for="nik" class="form-label">NIK</label>
                    <input type="text" wire:model="nik" class="form-control" placeholder="Masukan NIK">
                    @error('nik')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>

                <button type="submit" class="btn btn-primary fw-bold w-100">Kirim Permohonan</button>
            </form>

        </div>
    </div>
</div>
