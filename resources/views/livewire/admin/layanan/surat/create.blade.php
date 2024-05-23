<div class="card card-primary">
    <div class="card-header">
        <h3 class="card-title fw-bold">Tambah Surat</h3>
        <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-plus"></i>
            </button>
        </div>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
        <form wire:submit.prevent="store" enctype="multipart/form-data">
            <div class="form-group mb-3">
                <label for="nama_surat" class="form-label">Nama Surat</label>
                <input type="text" class="form-control" wire:model="nama_surat" placeholder="Masukan Nama Surat">
                @error('nama_surat')
                    <small class="text-danger">
                        {{ $message }}
                    </small>
                @enderror
            </div>
            <div class="mb-3">
                <label for="desc" class="form-label">Deskripsi</label>
                <textarea cols="30" rows="4" class="form-control" placeholder="Masukan Deskripsi" wire:model="desc"></textarea>
                {{-- <textarea id="editor" wire:model="desc"></textarea> --}}
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
            <button type="submit" class="btn btn-primary fw-bold">Tambahkan</button>
        </form>
    </div>
    <!-- /.card-body -->
</div>
