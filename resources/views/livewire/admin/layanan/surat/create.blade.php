<div class="mb-5">
    @section('breadcrumbs')
        <li class="breadcrumb-item"><a href="{{ route('surat.index') }}">Surat</a></li>
        <li class="breadcrumb-item active">Tambah Surat</li>
    @endsection
    
    <div class="card">
        <div class="card-header">
            <h4 class="card-title fw-bold">Tambah Surat</h4>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <form wire:submit.prevent="store" enctype="multipart/form-data">
                <div class="row">
                    <div class="col">
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
                            <label for="formFile" class="form-label">File Template Surat (.doc/.docx)</label>
                            <input class="form-control" type="file" wire:model="template">
                            @error('template')
                                <small class="text-danger">
                                    {{ $message }}
                                </small>
                            @enderror
                        </div>
                    </div>
                    <div class="col">
                        <div class="mb-3">
                            <label for="desc" class="form-label">Deskripsi</label>
                            <textarea cols="30" rows="4" id="editor" placeholder="Masukan Deskripsi" wire:model="desc"></textarea>
                            {{-- <textarea id="editor" wire:model="desc"></textarea> --}}
                            @error('desc')
                                <small class="text-danger">
                                    {{ $message }}
                                </small>
                            @enderror
                        </div>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary fw-bold mt-4">Tambahkan</button>
            </form>
        </div>
        <!-- /.card-body -->
    </div>
</div>

