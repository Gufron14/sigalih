<div>
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
            <h5 class="fw-bold">Tambah Warga</h5>
        </div>
        <div class="card-body">
            <form wire:submit.prevent="store" enctype="multipart/form-data">
                <div class="row">
                    <div class="col">
                        <div class="mb-3">
                            <label for="nama" class="form-label">Nama*</label>
                            <input type="text" class="form-control @error('nama') is-invalid @enderror"
                                wire:model="nama">
                            @error('nik')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="ttl" class="form-label">Tempat, tanggal lahir*</label>
                            <input type="text" class="form-control @error('ttl') is-invalid @enderror"
                                wire:model="ttl">
                            @error('ttl')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="col">
                        <div class="mb-3">
                            <label for="nik" class="form-label">NIK*</label>
                            <input type="text" class="form-control @error('nik') is-invalid @enderror"
                                wire:model="nik">
                            @error('nik')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="jk" class="form-label">Jenis Kelamin*</label>
                            <select class="form-select @error('jk') is-invalid @enderror" wire:model="jk">
                                <option selected>Pilih Jenis Kelamin</option>
                                <option value="L">Laki-laki</option>
                                <option value="P">Perempuan</option>
                            </select>
                            @error('jk')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="row mt-1 mb-3">
                    <div class="col">
                        <label for="alamat" class="form-label">Dusun/Kp.*</label>
                        <input type="text" class="form-control @error('alamat') is-invalid @enderror"
                            wire:model="alamat">
                        @error('alamat')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="col">
                        <label for="rt" class="form-label">RT*</label>
                        <input type="text" class="form-control @error('rt') is-invalid @enderror" wire:model="rt">
                        @error('rt')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="col">
                        <label for="rw" class="form-label">RW*</label>
                        <input type="text" class="form-control @error('rw') is-invalid @enderror" wire:model="rw">
                        @error('rw')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="col">
                        <label for="desa" class="form-label">Desa/Kel.</label>
                        <input type="text"
                            class="form-control @error('desa') is-invalid @enderror" wire:model="desa">
                        @error('desa')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="col">
                        <label for="kec" class="form-label">Kec.</label>
                        <input type="text" class="form-control @error('kec') is-invalid @enderror"
                            wire:model="kec">
                        @error('kec')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="col">
                        <label for="kab" class="form-label">Kab./Kota</label>
                        <input type="text" class="form-control @error('kab') is-invalid @enderror"
                            wire:model="kab">
                        @error('kab')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                {{-- <div class="row mb-4">
                        <div class="col">
                                <label for="" class="form-label">Provinsi</label>
                                <input type="text" value="Jawa Barat" class="form-control">
                        </div>
                        <div class="col">
                                <label for="" class="form-label">Kewarganegaraan*</label>
                                <input type="text" value="Indonesia" class="form-control">
                        </div>
                    </div> --}}

                <div class="row">
                    <div class="col">
                        <div class="mb-3">
                            <label for="agama" class="form-label">Agama*</label>
                            <select class="form-select @error('agama') is-invalid @enderror"" wire:model="agama">
                                <option selected>Pilih Agama</option>
                                <option value="islam">Islam</option>
                                <option value="kristen">Kristen</option>
                                <option value="katolik">Katolik</option>
                                <option value="konghucu">Konghucu</option>
                                <option value="hindu">Hindu</option>
                                <option value="budha">Budha</option>
                            </select>
                            @error('agama')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                        </div>
                    </div>
                    <div class="col">
                        <div class="mb-3">
                            <label for="status" class="form-label">Status Perkawinan*</label>
                            <select class="form-select @error('status') is-invalid @enderror""  wire:model="status">
                                <option value="">Pilih Status Perkawinan</option>
                                <option value="Kawin">Kawin</option>
                                <option value="Belum Kawin">Belum Kawin</option>
                            </select>
                            @error('status')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="col">
                        <div class="mb-3">
                            <label for="" class="form-label">Pekerjaan*</label>
                            <input type="text" class="form-control @error('nik') is-invalid @enderror"
                                wire:model="pekerjaan">
                            @error('pekerjaan')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                </div>
                <button type="submit" class="btn btn-primary fw-bold">
                    <i class="fas fa-save me-1"></i> Simpan Data
                </button>
            </form>
        </div>
    </div>
</div>