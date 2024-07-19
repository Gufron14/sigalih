<div>
    <div class="card">
        <div class="card-header d-flex justify-content-between">
            <h5 class="card-title">
                Buku Register
            </h5>
            <button wire:click="downloadPdf" class="btn btn-sm btn-primary"><i class="fas fa-file-pdf me-2"></i>Download</button>
        </div>
        <div class="card-body">            
            <div class="table-responsive">
                <table class="table table-sm table-bordered table-striped   ">
                    <thead>
                        <th>NO</th>
                        <th>Tanggal Surat</th>
                        <th>Jenis Surat</th>
                        <th>Nomor Register</th>
                        <th>Nama Pemohon</th>
                        <th>Tempat, tanggal lahir</th>
                        <th>Alamat</th>
                        {{-- <th>Tujuan Surat</th> --}}
                    </thead>
                <tbody>
                    @forelse ($registers as $register)                
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $register->tanggal_surat }}</td>
                        <td>{{ $register->jenisSurat->nama_surat }}</td>
                        <td>{{ $register->nomor_surat }}</td>
                        <td>{{ $register->user->warga->nama }}</td>
                        <td>{{ $register->user->warga->ttl }}</td>
                        <td>Kp. {{ $register->user->warga->alamat }},
                            RT. {{ $register->user->warga->rt }},
                            RW. {{ $register->user->warga->rw }}
                        </td>
                        {{-- <td></td> --}}
                    </tr>
                    @empty
                        <td colspan="7" class="p-3">Belum ada Data</td>
                    @endforelse
                </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
