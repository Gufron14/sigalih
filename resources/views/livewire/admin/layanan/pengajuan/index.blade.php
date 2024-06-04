<div>
    @section('breadcrumbs')
        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
        <li class="breadcrumb-item active">Permohonan Surat</li>
    @endsection

    <div class="card">
        <div class="card-header">
                <h5 class="fw-bold">Daftar Permohonan Surat</h5>
        </div>
        <div class="card-body">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>Tanggal & Waktu</th>
                        <th>Nama Pemohon</th>
                        <th>Jenis Surat</th>
                        <th>Status</th>
                        <th class="text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($pengajuans as $pengajuan)
                        <tr>
                            <td>{{ $pengajuan->created_at->format('d/m/Y - H:i:s') }}</td>
                            <td>{{ $pengajuan->warga->nama }}</td>
                            <td>{{ $pengajuan->surat->nama_surat }}</td>
                            <td>
                                @if ($pengajuan->status === 'tunggu')
                                    <div class="badge bg-secondary-faded text-dark">
                                        Menunggu
                                    </div>
                                @elseif ($pengajuan->status === 'proses')
                                    <div class="badge bg-primary-faded">
                                        Diproses
                                    </div>
                                @elseif ($pengajuan->status === 'selesai')
                                    <div class="badge bg-success-faded">
                                        Selesai
                                    </div>
                                @elseif ($pengajuan->status === 'tolak')
                                    <div class="badge bg-danger-faded">
                                        Ditolak
                                    </div>
                                @endif
                            </td>

                            <td class="text-center">
                                <a href="{{ route('view-pengajuan', $pengajuan->id) }}">Proses</a>
                            </td>
                        </tr>
                    @empty
                        <td colspan="5" class="text-center p-5">
                            <i class="far fa-times-circle text-danger mb-5" style="font-size: 58px"></i>
                            <p>Belum ada yang mengajukan Surat Permohonan</p>
                        </td>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
