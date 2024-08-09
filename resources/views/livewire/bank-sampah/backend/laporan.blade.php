<div class="mt-4">
    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h5 class="card-title">Laporan Bank Sampah</h5>
            <button wire:click="downloadPdf" class="btn btn-primary btn-sm">Download PDF</button>
        </div>        
        <div class="card-body">
            <div class="d-flex gap-3 mb-3 align-items-center">
                {{-- <div class="col-md-3">
                    <input type="date" wire:model="startDate" class="form-control">
                </div>
                <div class="col-md-3">
                    <input type="date" wire:model="endDate" class="form-control">
                </div> --}}
                <div class="col-md-3">
                    <select wire:model="filterType" class="form-select">
                        <option value="all">Semua</option>
                        <option value="masuk">Dana Masuk</option>
                        <option value="keluar">Dana Keluar</option>
                    </select>
                </div>
                <div class="col-md-3">
                    <button wire:click="applyFilters" class="btn btn-primary btn-sm">Filter</button>
                </div>
            </div>
            <div class="table-responsive">
                <table class="table table-sm table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>Tanggal</th>
                            <th>Keterangan</th>
                            <th>Dana Masuk</th>
                            <th>Dana Keluar</th>
                            <th>Sisa Saldo</th>
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
