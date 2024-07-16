<div class="mt-4">
    <!-- Page Title-->
    <div class="row justify-content-between">
        <div class="col">
            <h2 class="fs-4 mb-2">Dashboard Bank Sampah</h2>
            <p class="text-muted mb-4">Selamat datang di Dashboard Bank Sampah</p>
        </div>
        <div class="col">
            <!-- Button trigger modal -->
            <button type="button" class="btn btn-primary float-end" data-bs-toggle="modal" data-bs-target="#exampleModal">
                Tambah Pemasukan
            </button>

            <!-- Modal -->
            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form action="">
                                <div class="mb-3">
                                    <label for="" class="form-label">Pemasukan dari</label>
                                    <input type="text" class="form-control">
                                </div>
                                <div>
                                    <label for="" class="form-label">Nominal</label>
                                    inp
                                </div>
                            </form>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="button" class="btn btn-primary">Save changes</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- / Page Title-->

    <div class="row row-cols-md-3 g-3">

        {{-- Saldo --}}
        <div class="col">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex align-items-center">
                        <i class="fas fa-money-bill-wave text-secondary fs-1 me-3"></i>
                        <div>
                            <label class="form-label">Saldo</label>
                            <h2 class="fw-bold text-primary">@currency($totalSaldo)</h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        {{-- Pemasukan --}}
        <div class="col">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex align-items-center">
                        <i class="fas fa-money-bill-wave text-secondary fs-1 me-3"></i>
                        <div>
                            <label class="form-label">Pemasukan</label>
                            <h2 class="fw-bold text-success">@currency($totalPemasukan)</h2>
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
                            <h2 class="fw-bold text-danger">@currency($totalPengeluaran)</h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        {{-- Sampah Terkumpul --}}
        <div class="col">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex align-items-center">
                        <i class="fas fa-dumpster text-secondary fs-1 me-3"></i>
                        <div>
                            <label class="form-label">Sampah Terkumpul</label>
                            <h2 class="fw-bold">{{ (float) $totalBeratSampah }} <span class="h6 text-muted">Kg</span>
                            </h2>
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
