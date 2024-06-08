<div>
    @section('breadcrumbs')
        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
        <li class="breadcrumb-item active">Permohonan Surat</li>
    @endsection

    <div class="card">
        <div class="card-header">
            <h5>Daftar Permohonan Surat</h5>
        </div>
        <div class="card-body">
            <table class="table table-sm">
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
                            <td>{{ $pengajuan->user->warga->nama }}</td>
                            <td>{{ $pengajuan->jenisSurat->nama_surat }}</td>
                            <td>
                                @if ($pengajuan->approved == false)
                                    <span class="badge bg-warning-faded text-dark">Menunggu</span>
                                @else
                                    <span class="badge bg-success-faded text-white">Disetujui</span>
                                @endif
                            </td>

                            <td class="text-center">
                                <a href="{{ route('view-pengajuan', ['id' => $pengajuan->id]) }}"
                                    class="btn btn-secondary-faded btn-sm"> <i class="fas fa-tools text-primary"></i>
                                </a>
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
