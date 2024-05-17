<div class="card card-primary collapsed-card">
    <div class="card-header">
        <h3 class="card-title fw-bold">Tambah Surat</h3>
        <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse"><i
                    class="fas fa-plus"></i>
            </button>
        </div>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
        <form action="{{ route('surat.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label for="nama_surat" class="form-label">Nama Surat</label>
                <input type="nama_surat" class="form-control" id="nama_surat" name="nama_surat"
                    placeholder="masukan nama surat">
                @error('nama_surat')
                    <small class="text-danger">
                        {{ $message }}
                    </small>
                @enderror
            </div>
            <div class="mb-3">
                <label for="desc" class="form-label">Deskripsi (Opsional)</label>
                <input class="form-control" id="desc" name="desc" rows="3"
                    placeholder="deskripsi surat"></input>
                @error('desc')
                    <small class="text-danger">
                        {{ $message }}
                    </small>
                @enderror
            </div>
            <div class="mb-3">
                <label for="formFile" class="form-label">Tambahkan File Template Surat
                    (.doc/.docx)</label>
                <input class="form-control" type="file" name="template" id="formFile">
                @error('template')
                    <small class="text-danger">
                        {{ $message }}
                    </small>
                @enderror
            </div>
            <button type="submit" class="btn btn-primary">Tambahkan</button>
        </form>
    </div>
    <!-- /.card-body -->
</div>