<div class="container">
    {{-- Penarikan Saldo --}}
    @forelse ($penarikanSaldo as $penarikan)
        <div class="card shadow w-50 mx-auto mb-4">
            <div class="card-body">
                <div class="row justify-content-between align-items-center">
                    <div class="col">
                        <h6>Penarikan Saldo</h6>
                        <h3 class="fw-bold text-success">@currency($penarikan->nominal);-</h3>
                        <small class="text-secondary">
                            <i class="fas fa-calendar-alt"></i> &nbsp; {{ $penarikan->created_at->format('d/m/Y') }}
                        </small>
                    </div>
                    <div class="col">
                        @if ($penarikan->status == 'pending')
                            <span class="badge text-bg-warning"><i class="fas fa-hourglass-half me-2"></i>Menunggu</span>
                            <div class="mt-2 lh-1">
                                <small>🙂Tunggu ya, permintaan akan segera diproses.</small>
                            </div>
                        @elseif ($penarikan->status == 'approved')
                            <span class="badge text-bg-primary"><i class="fas fa-check me-2"></i>Disetujui</span>
                            <div class="mt-2 lh-1">
                                <small>🥳Horee, admin sudah menerima permintaan kamu.</small>
                            </div>
                        @elseif ($penarikan->status == 'selesai')
                            <span class="badge text-bg-success"><i class="fas fa-check me-2"></i>Selesai</span>
                            <div class="mt-2 lh-1">
                                <small>😉Transaksi selesai.</small>
                            </div>
                        @elseif ($penarikan->status == 'rejected')
                            <span class="badge text-bg-danger"><i class="fas fa-times me-2"></i>Ditolak</span>
                            <div class="mt-2 lh-1">
                                <small>😞Yah, kamu tidak memenuhi persyaratan.</small>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    @empty
        <div class="text-center">
            <p>Belum ada riwayat transaksi.</p>
        </div>
    @endforelse
</div>
