<div class="card card-primary collapsed-card">
    <div class="card-header">
        <h3 class="card-title fw-bold">Tambah Surat</h3>
        <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-plus"></i>
            </button>
        </div>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
        <form wire:submit="store" enctype="multipart/form-data">
            <div class="mb-3">
                <label for="nama_surat" class="form-label">Nama Surat</label>
                <input type="text" class="form-control" wire:model="nama_surat" placeholder="masukan nama surat">
                @error('nama_surat')
                    <small class="text-danger">
                        {{ $message }}
                    </small>
                @enderror
            </div>
            <div class="mb-3">
                <label for="desc" class="form-label">Deskripsi (Opsional)</label>
                <input class="form-control" wire:model="desc" rows="3" placeholder="deskripsi surat"></input>
                @error('desc')
                    <small class="text-danger">
                        {{ $message }}
                    </small>
                @enderror
            </div>
            <div class="mb-3">
                <label for="formFile" class="form-label">Tambahkan File Template Surat (.doc/.docx)</label>
                <input class="form-control" type="file" wire:model="template">
                @error('template')
                    <small class="text-danger">
                        {{ $message }}
                    </small>
                @enderror
            </div>
            <button wire:submit class="btn btn-primary fw-bold">Tambahkan</button>
        </form>
    </div>
    <!-- /.card-body -->
</div>
