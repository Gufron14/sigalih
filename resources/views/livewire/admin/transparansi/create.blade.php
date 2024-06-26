<div>
    @section('breadcrumbs')
        <li class="breadcrumb-item"><a href="{{ route('transparan') }}">Transparansi</a></li>
        <li class="breadcrumb-item active">Tambah Transparansi</li>
    @endsection

    @if (session()->has('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @elseif (session()->has('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif

    <div class="card">
        <div class="card-header">
            <div class="card-title">
                Tambah Transparansi
            </div>
        </div>
        <div class="card-body">
            <form wire:submit.prevent="store">
                <div class="row">
                    <div class="col">
                        <div class="form-group">
                            <div class="mb-3">
                                <label for="keterangan" class="form-label">Keterangan</label>
                                <input type="text" class="form-control @error('keterangan') is-invalid @enderror"
                                    wire:model="keterangan">
                                @error('keterangan')
                                    <small class="text-danger">
                                        {{ $message }}
                                    </small>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="tahun" class="form-label">Tahun</label>
                                <input type="text" class="form-control @error('tahun') is-invalid @enderror"
                                    wire:model="tahun">
                                @error('tahun')
                                    <small class="text-danger">
                                        {{ $message }}
                                    </small>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="desc" class="form-label">Deskripsi</label>
                                <textarea class="form-control @error('desc') is-invalid @enderror" wire:model="desc"></textarea>
                                @error('desc')
                                    <small class="text-danger">
                                        {{ $message }}
                                    </small>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-group">
                            <div class="mb-3">
                                <label for="dokumen" class="form-label">File (.PDF)</label>
                                <input type="file" class="form-control @error('dokumen') is-invalid @enderror"
                                    wire:model="dokumen">
                                @error('dokumen')
                                    <small class="text-danger">
                                        {{ $message }}
                                    </small>
                                @enderror
                            </div>
                            <div class="mb-4">
                                <label for="infografik" class="form-label">Infografik (.JPG/.PNG)</label>
                                <input type="file" class="form-control @error('infografik') is-invalid @enderror"
                                    wire:model="infografik">
                                @error('infografik')
                                    <small class="text-danger">
                                        {{ $message }}
                                    </small>
                                @enderror
                            </div>
                        </div>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary fw-bold"><i class="fas fa-save me-2"></i> Simpan</button>
            </form>

        </div>
    </div>
</div>
