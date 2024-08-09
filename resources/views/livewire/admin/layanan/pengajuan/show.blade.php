@if (session()->has('success'))
    <span class="alert alert-success">
        {{ session('success') }}
    </span>
@endif
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
@if (session()->has('error'))
    <span class="alert alert-danger">
        {{ session('error') }}
    </span>
@endif
<div>

    <div class="card">
        <div class="card-header">
            <div class="d-flex justify-content-between align-items-center">
                <h5 class="card-title fw-bold">Permohonan {{ $pengajuan->jenisSurat->nama_surat }} </h5>
                <small d-flex justify-content-end>{{ $pengajuan->created_at->translatedFormat('l, d F Y') }} -
                    {{ $pengajuan->created_at->format('H:i') }} WIB</small>
            </div>
        </div>
        <div class="card-body">
            {{-- <div class="row mb-3">
                <div class="col">
                    <div for="" class="form-label">Nomor Surat</div>
                    <input type="text" wire:model="nomor_surat" class="form-control" placeholder="Masukan Nomor Surat">
                </div>
                <div class="col">
                    <div for="" class="form-label">Tanggal Surat</div>
                    <input type="text" wire:model="tanggal_surat" class="form-control" placeholder="Masukan Tanggal Surat">
                </div>
            </div> --}}
            <label class="form-label text-uppercase fw-bold">
                Identitas Pemohon
            </label>
            <div class="table-responsive">
                <div class="mb-3">
                    <table class="table table-sm">
                        <tbody>
                            <tr>
                                <td>Nama</td>
                                <td>:
                                    {{ $pengajuan->user?->warga?->nama ?? ($pengajuan->warga?->nama ?? 'Tidak diketahui') }}
                                </td>
                                <td rowspan="7">
                                    <div class="d-flex align-items-center justify-content-center">
                                        <img src="@isset($pengajuan->user->avatar) {{ asset('storage/' . $pengajuan->user->avatar) }} @else https://via.placeholder.com/150 @endisset"
                                            alt="" style="width: 4cm; height:6cm" class="border border-danger">
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>Tempat, tanggal lahir</td>
                                <td>:
                                    {{ $pengajuan->user?->warga?->ttl ?? ($pengajuan->warga?->ttl ?? 'Tidak diketahui') }}
                                </td>
                            </tr>
                            <tr>
                                <td>Status</td>
                                <td>:
                                    {{ $pengajuan->user?->warga?->status ?? ($pengajuan->warga?->status ?? 'Tidak diketahui') }}
                                </td>
                            </tr>
                            <tr>
                                <td>Jenis Kelamin</td>
                                <td>:
                                    @if ($pengajuan->user->warga->jk == 'L')
                                        Laki - laki
                                    @elseif ($pengajuan->user->warga->jk == 'P')
                                        Perempuan
                                    @endif
                                </td>
                            </tr>
                            <tr>
                                <td>Pekerjaan</td>
                                <td>:
                                    {{ $pengajuan->user?->warga?->pekerjaan ?? ($pengajuan->warga?->pekerjaan ?? 'Tidak diketahui') }}
                                </td>
                            </tr>
                            <tr>
                                <td>Alamat</td>
                                <td>:
                                    {{ $pengajuan->user?->warga?->alamat ?? ($pengajuan->warga?->alamat ?? 'Tidak diketahui') }},
                                    RT.
                                    {{ $pengajuan->user?->warga?->rt ?? ($pengajuan->warga?->rt ?? 'Tidak diketahui') }}
                                    ,
                                    RW.
                                    {{ $pengajuan->user?->warga?->rw ?? ($pengajuan->warga?->rw ?? 'Tidak diketahui') }}
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="mb-3">
                    <label class="form-label text-uppercase fw-bold">
                        Lampiran Persyaratan
                    </label>
                    {{-- @php
                        $formData = json_decode($pengajuan->form_data, true);
                    @endphp --}}
                    {{-- <div class="row">
                        <form wire:submit.prevent="updateFormData">
                            @foreach ($formData as $key => $value)
                                <div class="col-5 text-capitalize">
                                    <label for="" class="form-label">{{ $key }}</label>
                                </div>
                                @if (is_string($value) && str_starts_with($value, 'uploads/'))
                                    <div class="col mb-3">
                                        <img src="{{ asset('storage/' . $value) }}" class="img-fluid rounded" alt="Image" width="200px">
                                        <input type="file" class="form-control" wire:model="updateFormData.{{ $key }}">
                                        @error('updateFormData.' . $key) <span class="error">{{ $message }}</span> @enderror
                                    </div>
                                @elseif (is_string($value))
                                    <div class="col mb-3">
                                        <input type="text" class="form-control" wire:model="updateFormData.{{ $key }}">
                                        @error('updateFormData.' . $key) <span class="error">{{ $message }}</span> @enderror
                                    </div>
                                @elseif (is_array($value))
                                    <div class="col">
                                        @foreach ($value as $index => $item)
                                            <input type="text" class="form-control" wire:model="updateFormData.{{ $key }}.{{ $index }}">
                                            @error('updateFormData.' . $key . '.' . $index) <span class="error">{{ $message }}</span> @enderror
                                        @endforeach
                                    </div>
                                @endif
                            @endforeach
                            <button type="submit" class="btn btn-sm btn-warning">Ubah Data</button>
                        </form>
                        
                    </div> --}}
                    <form wire:submit.prevent="updateFormData" enctype="multipart/form-data">
                        <table class="table table-sm text-capitalize align-middle">
                            <tbody>
                                @php
                                    $formData = json_decode($pengajuan->form_data, true);
                                @endphp
                                @foreach ($formData as $key => $value)
                                    <tr>
                                        <td>{{ $key }}</td>
                                        <td>
                                            @if (is_string($value) && str_starts_with($value, 'uploads/'))
                                                @php
                                                    $extension = pathinfo($value, PATHINFO_EXTENSION);
                                                    $isImage = in_array(strtolower($extension), [
                                                        'jpg',
                                                        'jpeg',
                                                        'png',
                                                        'gif',
                                                    ]);
                                                @endphp
                                                @if ($isImage)
                                                    <img src="{{ asset('storage/' . $value) }}"
                                                        class="img-fluid rounded" alt="Image" width="200px">
                                                @else
                                                    <a href="{{ asset('storage/' . $value) }}" download
                                                        class="btn btn-primary btn-sm">
                                                        Download {{ strtoupper($extension) }} File
                                                    </a>
                                                @endif
                                                <input type="file" class="form-control mt-2"
                                                    wire:model="updateFormData.{{ $key }}" readonly>
                                            @elseif (is_string($value))
                                                <input type="text" class="form-control"
                                                    wire:model="updateFormData.{{ $key }}"
                                                    value="{{ $value }}" readonly>
                                                @error('updatedFormData.' . $key)
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            @elseif (is_array($value))
                                                @foreach ($value as $index => $item)
                                                    <input type="text" class="form-control"
                                                        wire:model="updateFormData.{{ $key }}.{{ $index }}"
                                                        value="{{ $item }}" readonly>
                                                @endforeach
                                            @endif
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>

                        {{-- <button type="submit" class="btn btn-sm btn-warning">Update</button> --}}
                        {{-- <div wire:loading>
                            Mengubah.....
                        </div> --}}
                    </form>
                </div>
            </div>

            <div class="text-start">


                @if ($pengajuan->status == 'tunggu')
                    <button type="button" class="btn btn-primary fw-bold" data-bs-toggle="modal"
                        data-bs-target="#exampleModal">
                        <i class="fas fa-check-circle me-2"></i>Terima Pengajuan
                    </button>

                    <button type="button" class="btn btn-danger text-white fw-bold" data-bs-toggle="modal"
                        data-bs-target="#tolakModal">
                        <i class="fas fa-times-circle me-2"></i>Tolak Pengajuan
                    </button>
                @endif

                <!-- Modal Terima -->
                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="exampleModalLabel">Terima Permohonan</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <form wire:submit.prevent="terimaPermohonan" enctype="multipart/form-data">
                                <div class="modal-body">
                                    <div class="form-floating mb-3">
                                        <input type="text"
                                            class="form-control @error('nomor_surat') is-invalid @enderror"
                                            id="nomor_surat" wire:model="nomor_surat">
                                        <label for="nomor_surat" class="form-label">Nomor Surat</label>
                                        @error('nomor_surat')
                                            <small class="text-danger">
                                                {{ $message }}
                                            </small>
                                        @enderror
                                    </div>
                                    <div class="form-floating mb-3">
                                        <input type="date"
                                            class="form-control @error('tanggal_surat') is-invalid @enderror"
                                            id="tanggal_surat" wire:model="tanggal_surat">
                                        <label for="tanggal_surat" class="form-label">Tanggal Surat</label>
                                        @error('tanggal_surat')
                                            <small class="text-danger">
                                                {{ $message }}
                                            </small>
                                        @enderror
                                    </div>
                                    <div class="form-floating">
                                        <textarea class="form-control" placeholder="Leave a comment here" id="desc" style="height: 100px"
                                            wire:model="catatan_admin"></textarea>
                                        <label for="catatan_admin" class="form-label">Catatan</label>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <div wire:loading wire:target="terimaPermohonan">
                                        <span class="spinner-border spinner-border-sm text-primary"
                                            aria-hidden="true"></span>
                                        <span role="status text-dark">Sedang membuat surat...</span>
                                    </div>
                                    <div>
                                        <button type="button" class="btn btn-secondary"
                                            data-bs-dismiss="modal">Batal</button>
                                        <button type="submit" class="btn btn-primary fw-bold">
                                            <i class="fas fa-save me-2"></i>Simpan</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

                {{-- Modal Tolak --}}
                <div class="modal fade" id="tolakModal" tabindex="-1" aria-labelledby="tolakModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="tolakModalLabel">Tolak Permohonan</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <form wire:submit.prevent="tolakPermohonan">
                                <div class="modal-body">
                                    <div class="form-floating">
                                        <textarea class="form-control @error('catatan_admin') is-invalid @enderror" placeholder="Catatan" id="catatan_admin"
                                            style="height: 100px" wire:model="catatan_admin"></textarea>
                                        <label for="catatan_admin" class="form-label">Catatan Penolakan</label>
                                        @error('catatan_admin')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary"
                                        data-bs-dismiss="modal">Batal</button>
                                    <button type="submit" class="btn btn-danger">Tolak Permohonan</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
