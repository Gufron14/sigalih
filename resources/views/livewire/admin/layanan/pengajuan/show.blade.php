<div>
    <div class="card card-primary card-outline">
        <div class="card-header">
            <div class="card-title">
                <div class="justify-content-between">
                    <h5 class="fw-bold">Pengajuan {{ $pengajuan->jenisSurat->nama_surat }} </h5>
                    <small d-flex justify-content-end>{{ $pengajuan->created_at->translatedFormat('l, d F Y') }} - {{ $pengajuan->created_at->format('H:i:s') }} WIB</small>
                </div>
            </div>
        </div>
        <div class="card-body">
            <div class="row mb-3">
                <div class="col">
                    <div for="" class="form-label">Nomor Surat</div>
                    <input type="text" wire:model="nomor_surat" class="form-control" placeholder="Masukan Nomor Surat">
                </div>
                <div class="col">
                    <div for="" class="form-label">Tanggal Surat</div>
                    <input type="text" wire:model="tanggal_surat" class="form-control" placeholder="Masukan Tanggal Surat">
                </div>
            </div>
            <div class="table-responsive">
                <table class="table table-sm mb-5">
                    <thead class="table-secondary">
                        <tr>
                            <th colspan="3" class="h6 text-center fw-bold">Identitas Pemohon</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Nama</td>
                            <td>: {{ $pengajuan->user->warga->nama }}</td>
                            <td rowspan="7">
                                <div class="d-flex align-items-center justify-content-center">
                                    @if ($pengajuan->user->warga->foto)
                                        <img src="{{ asset('storage/' . $pengajuan->user->warga->foto) }}" alt="" style="width: 4cm; height:6cm" class="border border-danger">
                                    @else
                                        <img src="https://via.placeholder.com/150" alt="" style="width: 4cm; height:6cm" class="border border-danger">
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
                            <td>: {{ $pengajuan->user->warga->alamat }}, RT. {{ $pengajuan->user->warga->rt }} , RW. {{ $pengajuan->user->warga->rw }}, Ds. {{ $pengajuan->user->warga->desa }}</td>
                        </tr>
                    </tbody>
                    <tfoot>
                        @php
                            $formData = json_decode($pengajuan->form_data, true);
                        @endphp
                        @foreach ($formData as $key => $value)
                            <tr>
                                <td>{{ $key }}</td>
                                <td>
                                    @if (is_string($value))
                                        {{ $value }}
                                    @elseif (is_array($value))
                                    <ul>
                                        @foreach ($value as $item)
                                            <li>{{ $item }}</li>
                                        @endforeach
                                    </ul>
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                    </tfoot>
                </table>
            </div>

            {{-- Lihat PDF --}}
            <button wire:click="lihatPdf" class="btn btn-success fw-bold">Lihat PDF</button>

            {{-- Kirim Ke User --}}
            <button wire:click="kirimSurat" class="btn btn-danger fw-bold">Terima Pengajuan</button>

            <a href="" class="btn btn-secondary fw-bold">Kembali</a>
        </div>
    </div>
</div>
