@section('breadcrumbs')
    <li class="breadcrumb-item"><a href="{{ route('pengajuan') }}">Permohonan Surat</a></li>
    <li class="breadcrumb-item active">{{ $pengajuan->jenisSurat->nama_surat }}</li>
@endsection

<div>
    @if (session()->has('error'))
        <span class="alert alert-danger">
            {{ session('error') }}
        </span>
    @endif

    <div class="card card-primary card-outline">
        <div class="card-header">
            <div class="card-title">
                <div class=" d-flex justify-content-between">
                    <h5 class="fw-bold">Permohonan {{ $pengajuan->jenisSurat->nama_surat }} </h5>
                    <small d-flex justify-content-end>{{ $pengajuan->created_at->translatedFormat('l, d F Y') }} -
                        {{ $pengajuan->created_at->format('H:i:s') }} WIB</small>
                </div>
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
            <div class="table-responsive mb-4">
                <div class="mb-3">
                    <table class="table table-sm">
                        <tbody>
                            <tr>
                                <td>Nama</td>
                                <td>: {{ $pengajuan->user->warga->nama }}</td>
                                <td rowspan="7">
                                    <div class="d-flex align-items-center justify-content-center">
                                        @if ($pengajuan->user->warga->foto)
                                            <img src="{{ asset('storage/' . $pengajuan->user->warga->foto) }}"
                                                alt="" style="width: 4cm; height:6cm"
                                                class="border border-danger">
                                        @else
                                            <img src="https://via.placeholder.com/150" alt=""
                                                style="width: 4cm; height:6cm" class="border border-danger">
                                        @endif
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>Tempat, tanggal lahir</td>
                                <td>: {{ $pengajuan->user->warga->ttl }}</td>
                            </tr>
                            <tr>
                                <td>Status</td>
                                <td>: {{ $pengajuan->user->warga->status }}</td>
                            </tr>
                            <tr>
                                <td>Jenis Kelamin</td>
                                <td>: {{ $pengajuan->user->warga->jk }}</td>
                            </tr>
                            <tr>
                                <td>Agama</td>
                                <td>: {{ $pengajuan->user->warga->agama }}</td>
                            </tr>
                            <tr>
                                <td>Pekerjaan</td>
                                <td>: {{ $pengajuan->user->warga->pekerjaan }}</td>
                            </tr>
                            <tr>
                                <td>Alamat</td>
                                <td>: {{ $pengajuan->user->warga->alamat }}, RT. {{ $pengajuan->user->warga->rt }} ,
                                    RW.
                                    {{ $pengajuan->user->warga->rw }}, Ds. {{ $pengajuan->user->warga->desa }}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="mb-3">
                    <label class="form-label text-uppercase fw-bold">
                        Lampiran Persyaratan
                    </label>
                    <table class="table table-sm">
                        <tbody>
                        @php
                            $formData = json_decode($pengajuan->form_data, true);
                        @endphp
                        @foreach ($formData as $key => $value)
                            <tr>
                                <td>{{ $key }}</td>
                                <td>:
                                    @if (is_string($value) && str_starts_with($value, 'uploads/'))
                                        <img src="{{ asset('storage/' . $value) }}" class="img-fluid rounded" alt="Image" width="200px">
                                    @elseif (is_string($value))
                                        {{ $value }}
                                    @elseif (is_array($value))
                                        @foreach ($value as $item)
                                            {{ $item }}
                                        @endforeach
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                        
                        </tbody>
                    </table>
                </div>
            </div>

            <div class="text-end">
                {{-- Lihat PDF --}}
                <button wire:click="lihatPdf" class="btn btn-primary fw-bold">
                    <i class="fas fa-save me-2"></i>Simpan</button>

                {{-- Kirim Ke User --}}
                <button wire:click="kirimSurat" class="btn btn-success text-white fw-bold">
                    <i class="fas fa-thumbs-up me-2"></i>Terima Pengajuan</button>
            </div>

        </div>
    </div>
</div>
