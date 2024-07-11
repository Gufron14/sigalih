<div>
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @elseif (session('error'))
        <div class="alert alert-error">
            {{ session('error') }}
        </div>
    @endif
    <div class="card">
        <div class="card-header">
            <h5 class="card-title fw-bold">Daftar Permohonan Surat</h5>
        </div>
        <div class="card-body">
            <table class="table table-sm">
                <thead>
                    <tr>
                        <th>Tanggal & Waktu</th>
                        <th>Nama Pemohon</th>
                        <th>Jenis Surat</th>
                        <th>Status</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($pengajuans as $pengajuan)
                        <tr>
                            <td>{{ $pengajuan->created_at->format('d/m/Y - H:i') }} WIB</td>
                            <td>
                                {{ $pengajuan->user?->warga?->nama ?? $pengajuan->warga?->nama ?? 'Tidak diketahui' }}
                            </td>
                            <td>{{ $pengajuan->jenisSurat->nama_surat }}</td>
                            <td>
                                @if ($pengajuan->status == 'tunggu')
                                    <span class="badge bg-warning text-dark"><i
                                            class="fas fa-hourglass-half me-1"></i>Menunggu</span>
                                @elseif ($pengajuan->status == 'terima')
                                    <span class="badge bg-success text-white"><i
                                            class="fas fa-check me-1"></i>Selesai</span>
                                @else
                                    <span class="badge bg-danger text-white"><i
                                            class="fas fa-times me-1"></i>Ditolak</span>
                                @endif
                            </td>

                            <td class="">
                                @if ($pengajuan->status == 'tunggu')
                                    <a href="{{ route('view-pengajuan', ['id' => $pengajuan->id]) }}"
                                        class="btn btn-secondary-faded btn-sm text-primary"> <i
                                            class="fas fa-edit me-1 text-primary"></i>Proses
                                    </a>
                                @elseif ($pengajuan->status == 'terima')
                                    <a href="{{ Storage::url($pengajuan->file_surat) }}" target="_blank" download=""
                                        class="btn btn-secondary-faded btn-sm text-primary"> <i
                                            class="fas fa-eye me-1 text-primary"></i>Lihat Surat
                                    </a>
                                @endif
                            </td>
                        </tr>
                    @empty
                        <td colspan="5" class="text-center p-5">
                            <p class="text-danger">Belum ada yang mengajukan Surat Permohonan.</p>
                        </td>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
