<div>
    <h2 class="fs-4 mb-2">Dashboard</h2>
    <p class="text-muted mb-4">Selamat Datang di Sistem Informasi Sirnagalih (Sigalih)</p>

    <div class="row row-cols-1 row-cols-md-3">
        <div class="col">
            <div class="card">
                <div class="card-body d-flex align-items-center gap-4">
                    <i class="fas fa-inbox fs-1 text-secondary"></i>
                    <div>
                        <label class="form-label">Permohonan Surat</label>
                        <h2 class="fw-bold">{{ $requestSurat }}</h2>
                    </div>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="card">
                <div class="card-body d-flex align-items-center gap-4">
                    <i class="bi bi-card-text fs-1 text-secondary"></i>
                    <div>
                        <label class="form-label">User</label>
                        <h2 class="fw-bold">{{ $user }}</h2>
                    </div>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="card">
                <div class="card-body d-flex align-items-center gap-4">
                    <i class="fas fa-users fs-1 text-secondary"></i>
                    <div>
                        <label class="form-label">Warga</label>
                        <h2 class="fw-bold">{{ $warga}} <span class="h6 text-muted">Jiwa</span></h2>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
