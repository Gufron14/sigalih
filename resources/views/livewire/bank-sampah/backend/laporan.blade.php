<div class="mt-4">
    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h5 class="card-title">Laporan Bank Sampah</h5>
            <button wire:click="downloadPdf" class="btn btn-primary btn-sm">Download PDF</button>
        </div>        
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-sm table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>Tanggal</th>
                            <th>Keterangan</th>
                            <th>Dana Masuk</th>
                            <th>Dana Keluar</th>
                            <th>Saldo</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($transactions as $transaction)
                            <tr>
                                <td>{{ $transaction->created_at->format('d/m/Y H:i') }}</td>
                                <td>{{ $transaction->ket }}</td>
                                <td>@if($transaction->dana_masuk > 0) @currency($transaction->dana_masuk) @endif</td>
                                <td>@if($transaction->dana_keluar > 0) @currency($transaction->dana_keluar) @endif</td>
                                <td>@currency($transaction->sisa_saldo)</td>
                            </tr>
                        @endforeach
                        <tr class="fw-bold">
                            <td colspan="2">Total</td>
                            <td>@currency($totalDanaMasuk)</td>
                            <td>@currency($totalDanaKeluar)</td>
                            <td>@currency($totalSaldo)</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
