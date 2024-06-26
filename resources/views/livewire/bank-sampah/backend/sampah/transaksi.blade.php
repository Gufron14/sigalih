<div>
    <div class="card">
        <div class="card-header">
            <h4 class="card-title fw-bold">Riwayat Transaksi</h4>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table-sm table-bordered table striped">
                    <thead>
                        <th>Jenis Transaksi</th>
                        <th>Tanggal</th>
                        <th>Nama Nasabah</th>
                        <th>Nominal</th>
                        <th>Status</th>
                        <th class="text-center">Aksi</th>
                    </thead>
                    <tbody>
                        @forelse ($penarikans as $penarikan)
                            <tr>
                                <td>
                                    <span class="badge text-bg-primary">
                                        Penarikan Saldo
                                    </span>
                                </td>
                                <td>{{ $penarikan->created_at->format('d/m/Y - H:i:s') }}</td>
                                <td>{{ $penarikan->nama_warga }}</td>
                                <td>@currency($penarikan->nominal)</td>
                                <td>
                                    @if ($penarikan->status == 'pending')
                                        <span class="badge text-bg-warning"><i class="fas fa-hourglass-half me-1"></i>Menunggu</span>
                                    @elseif ($penarikan->status == 'approved')
                                        <span class="badge text-bg-primary"><i class="fas fa-exclamation-circle me-1"></i>Disetujui</span>
                                    @elseif ($penarikan->status == 'rejected')
                                        <span class="badge text-bg-danger"><i class="fas fa-times me-1"></i>Ditolak</span>
                                    @elseif ($penarikan->status == 'selesai')
                                        <span class="badge text-bg-success"><i class="fas fa-check me-1"></i>Selesai</span>
                                    @endif
                                </td>
                                <td>
                                    <div class="d-flex gap-2">
                                        @if ($penarikan->status === 'pending')
                                            <button wire:click="updateStatus({{ $penarikan->id }}, 'approved')" class="btn btn-sm btn-primary">Setujui</button>
                                            <button wire:click="updateStatus({{ $penarikan->id }}, 'rejected')" class="btn btn-sm btn-danger">Tolak</button>
                                        @elseif ($penarikan->status === 'approved')
                                            <button wire:click="updateStatus({{ $penarikan->id }}, 'rejected')" class="btn btn-sm btn-danger">Tolak</button>
                                            <button wire:click="updateStatus({{ $penarikan->id }}, 'completed')" class="btn btn-sm btn-success">Selesai</button>
                                        @elseif ($penarikan->status === 'rejected')
                                            <button wire:click="updateStatus({{ $penarikan->id }}, 'approved')" class="btn btn-sm btn-primary">Setujui</button>
                                        @elseif ($penarikan->status === 'selesai')
                                            <button class="btn btn-sm btn-success" disabled>Selesai</button>
                                        @endif
                                    </div>
                                </td>                                
                            </tr>
                        @empty
                            <td colspan="5" class="text-center">Belum ada Transaksi.</td>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>
