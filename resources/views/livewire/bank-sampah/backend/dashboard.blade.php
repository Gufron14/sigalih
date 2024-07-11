<div class="mt-4">
    <!-- Page Title-->
    <h2 class="fs-4 mb-2">Dashboard Bank Sampah</h2>
    <p class="text-muted mb-4">Selamat datang di Dashboard Bank Sampah</p>
    <!-- / Page Title-->

    <div class="row row-cols-md-3">
        {{-- Sampah Terkumpul --}}
        <div class="col">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex align-items-center">
                        <i class="fas fa-dumpster text-secondary fs-1 me-3"></i>
                        <div>
                            <label class="form-label">Sampah Terkumpul</label>
                            <h2 class="fw-bold">{{ (float) $totalBeratSampah }} <span class="h6 text-muted">Kg</span></h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        {{-- Pengeluaran --}}
        <div class="col">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex align-items-center">
                        <i class="fas fa-money-bill-wave text-secondary fs-1 me-3"></i>
                        <div>
                            <label class="form-label">Pengeluaran</label>
                            <h2 class="fw-bold">@currency($totalPengeluaran)</h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        {{-- Jumlah Nasabah --}}
        <div class="col">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex align-items-center">
                        <i class="fas fa-user text-secondary fs-1 me-3"></i>
                        <div>
                            <label class="form-label">Jumlah Nasabah</label>
                            <h2 class="fw-bold">{{ $nasabah }} <span class="h6 text-muted">Nasabah</span></h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
