<div>

    @section('breadcrumbs')
        <li class="breadcrumb-item"><a href="{{ route('jenisSampah') }}">Sampah</a></li>
        <li class="breadcrumb-item active">Edit Sampah</li>
    @endsection

    @section('button')
        <a href="{{ route('riwayatSetoran') }}" class="btn btn-success-faded btn-sm text-dark">Riwayat Setor</a>
        <a href="{{ route('setorSampah') }}" class="btn btn-success-faded btn-sm text-dark">Setor Sampah</a>
    @endsection

    <form wire:submit.prevent="update" enctype="multipart/form-data">
        <div class="modal-body">
            <div class="mb-3">
                <label for="jenis_sampah" class="form-label">Jenis Sampah</label>
                <input type="text" class="form-control @error('jenis_sampah') is-invalid @enderror"
                    wire:model="jenis_sampah" placeholder="{{ $sampah->jenis_sampah }}">
                @error('jenis_sampah')
                    <small class="text-danger">
                        {{ $message }}
                    </small>
                @enderror
            </div>
            <div class="mb-3">
                <label for="harga_per_kg" class="form-label">Harga/kg</label>
                <input type="text" class="form-control @error('harga_per_kg') is-invalid @enderror"
                    wire:model="harga_per_kg" placeholder="@currency($sampah->harga_per_kg)">
                @error('harga_per_kg')
                    <small class="text-danger">
                        {{ $message }}
                    </small>
                @enderror
            </div>
            <div class="">
                <label for="desc" class="form-label">Deskripsi</label>
                <textarea class="form-control" style="height: 100px" wire:model="desc" placeholder="{{ $sampah->desc }}"></textarea>
            </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
            <button type="submit" class="btn btn-primary fw-bold">
                <i class="fas fa-save me-2"></i>Simpan
                Perubahan</button>
        </div>
    </form>
</div>
