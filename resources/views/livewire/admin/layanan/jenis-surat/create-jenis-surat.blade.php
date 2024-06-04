<div>

    @section('breadcrumbs')
        <li class="breadcrumb-item"><a href="{{ route('surat') }}">Manajemen Surat</a></li>
        <li class="breadcrumb-item active">Tambah Jenis Surat</li>
    @endsection

    @if (session()->has('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <div class="card">
        <div class="card-header">
            <h4 class="card-title">
                Tambah Jenis Surat
            </h4>
        </div>
        <div class="card-body">
            <form wire:submit="store">
                <div class="row">
                    <div class="col">
                        <div class="mb-3">
                            <label for="nama_surat" class="form-label">Nama Surat</label>
                            <input type="text" wire:model="nama_surat" placeholder="contoh: Surat Keterangan Domisili"
                                class="form-control @error('nama_surat') is-invalid @enderror">
                            @error('nama_surat')
                                <small class="text-danger">
                                    {{ $message }}
                                </small>
                            @enderror
                        </div>
                    </div>
                    <div class="col">
                        <div class="mb-3">
                            <label for="singkatan" class="form-label">Singkatan Surat</label>
                            <input type="text" wire:model="singkatan" placeholder="contoh: SKD"
                                class="form-control @error('singkatan') is-invalid @enderror">
                            @error('singkatan')
                                <small class="text-danger">
                                    {{ $message }}
                                </small>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="mb-3">
                    <label for="desc" class="form-label">Deskripsi Surat</label>
                    <textarea type="text" class="form-control" wire:model="desc" placeholder="Masukan seperti pengertian dan persyaratan">Deskripsi</textarea>
                    @error('desc')
                    <small class="text-danger">
                        {{ $message }}
                    </small>
                    @enderror
                </div>
                <div class="form-group">
                    <label class="form-label">Field-field Formulir</label>
                    @foreach($form_fields as $index => $field)
                        <div class="row mb-3">
                            <div class="col">
                                <input type="text" class="form-control" placeholder="Nama Field" wire:model="form_fields.{{ $index }}.name">
                                @error('form_fields.' . $index . '.name') <span class="text-danger">{{ $message }}</span> @enderror
                            </div>
                            <div class="col">
                                <select class="form-control" wire:model="form_fields.{{ $index }}.rules">
                                    <option value="">Pilih Tipe Field</option>
                                    <option value="text">Text</option>
                                    <option value="file">File</option>
                                </select>
                                @error('form_fields.' . $index . '.rules') <span class="text-danger">{{ $message }}</span> @enderror
                            </div>
                            <div class="col-auto">
                                <button type="button" class="btn btn-danger" wire:click="removeFormField({{ $index }})">Hapus</button>
                            </div>
                        </div>
                    @endforeach
                    <button type="button" class="btn btn-light" wire:click="addFormField"><i class="fas fa-plus me-2"></i>Tambah Field</button>
                </div>
                <button type="submit" class="btn btn-primary">Simpan</button>
            </form>
        </div>
    </div>
</div>
