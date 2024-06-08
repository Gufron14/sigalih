<div>

    @section('breadcrumbs')
        <li class="breadcrumb-item"><a href="{{ route('admin.berita') }}">Manajemen Berita</a></li>
        <li class="breadcrumb-item active">Tambah Berita</li>
    @endsection

    @if (session()->has('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    
    <div class="card">
        <div class="card-header">
            <div class="card-title">
                Tambah Berita Baru
            </div>
        </div>
        <div class="card-body">
            <form wire:submit.prevent="store">
                <div class="row">
                    <div class="col-md-5">
                        <div class="mb-3">
                            <label for="title" class="form-label">Judul Berita</label>
                            <input type="text" class="form-control @error('title') is-invalid @enderror"
                                wire:model='title' placeholder="Masukan Judul Berita" autofocus>
                            @error('title')
                                <small class="text-danger">
                                    {{ $message }}
                                </small>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="image" class="form-label">Gambar</label>
                            <div wire:loading wire:target="image"><small>Mengunggah..</small></div>
                            <input type="file" class="form-control @error('image') is-invalid @enderror"
                                wire:model='image'>
                            @error('image')
                                <small class="text-danger">
                                    {{ $message }}
                                </small>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="slug" class="form-label">Slug</label>
                            <input type="text" class="form-control @error('slug') is-invalid @enderror"
                                wire:model='slug' placeholder="Masukan Slug">
                            @error('slug')
                                <small class="text-danger">
                                    {{ $message }}
                                </small>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-7">
                        <div class="mb-3">
                            <label for="content" class="form-label">Isi Berita</label>
                            <textarea name="" id="editor" cols="30" rows="10" wire:model='content' class="form-control"></textarea>
                            @error('content')
                                <small class="text-danger">
                                    {{ $message }}
                                </small>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="mt-3">
                    <button type="submit" class="btn btn-primary fw-bold">
                        <i class="fas fa-save me-2"></i>Publikasi</button>
                </div>
            </form>
        </div>
    </div>
</div>
