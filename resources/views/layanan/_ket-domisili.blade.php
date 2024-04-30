<div class="card">
    <div class="card-header bg-primary">
        <div class="card-title fw-bold text-white">Surat Permohonan Keterangan Domisili</div>
    </div>
    <form action="{{ route('surat.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="card-body">
            <label for="nik" class="form-label">NIK</label>
            <input type="text" class="form-control" name="nik" id="nik" placeholder="Masukan NIK">
            @error('nik')
                <small class="text-danger">
                    {{ $message }}
                </small>
            @enderror
        </div>
        <div class="d-flex justify-content-end mb-3 gap-3 me-3">
            <button type="submit" class="btn btn-primary">Buat Surat</button>
            <a href="" class="btn btn-danger fw-bold">Batal</a>
        </div>
    </form>
</div>
