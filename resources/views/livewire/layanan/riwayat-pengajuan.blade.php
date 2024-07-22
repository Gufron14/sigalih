<div class="container p-5">
    <div class="d-flex">
        <a href="{{ route('layanan') }}"><i class="fas fa-arrow-left me-2"></i></a>
        <h4 class="fw-bold mb-3">Riwayat Pengajuan</h4>
    </div>
    <div class="table-responsive">
        <table class="table table-bordered">
            <thead class="text-center">
                <th>Tanggal/Waktu</th>
                <th>Nama Surat</th>
                <th>Status</th>
                {{-- <th>Aksi</th> --}}
            </thead>
            <tbody>
                @if ($riwayatPengajuan->count() > 0)
                    @foreach ($riwayatPengajuan as $pengajuan)
                        <tr>
                            <td>{{ $pengajuan->updated_at->format('d/m/Y') }} - {{ $pengajuan->updated_at->diffForHumans() }}</td>
                            <td>{{ $pengajuan->jenisSurat->nama_surat }}</td>
                            <td class="text-center">
                                @if ($pengajuan->status == 'tunggu')
                                    <span class="badge text-bg-warning text-capitalize">
                                        menunggu
                                    </span>
                                @elseif ($pengajuan->status == 'terima')
                                    <span class="badge text-bg-success text-capitalize">
                                        Diterima
                                    </span>
                                @elseif ($pengajuan->status == 'tolak')
                                    <span class="badge text-bg-danger text-capitalize">
                                        Ditolak
                                    </span>
                                @endif
                                </td>
                            {{-- <td><a href="{{ route('createPermohonan', ['nama_surat' => $jenisSurat->nama_surat]) }}">Detail</a></td> --}}
                        </tr>
                    @endforeach
                @else
                    <p>Belum ada riwayat pengajuan.</p>
                @endif
            </tbody>
        </table>
    </div>
</div>
