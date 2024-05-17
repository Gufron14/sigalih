<div class="container">
    <div class="mt-5 mb-4">
        <div class="alert alert-light d-flex align-items-center" role="alert">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('layanan') }}">Layanan</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Status</li>
                </ol>
            </nav>
        </div>
    </div>
    <!-- Section: Timeline -->
    <section class="py-5">
        <ul class="timeline-with-icons">
            <li class="timeline-item mb-5">
                <span class="timeline-icon">
                    <i class="fas fa-rocket text-primary fa-sm fa-fw"></i>
                </span>

                <p class="fw-bold">
                    @if ($pengajuan->status === 'tunggu')
                        Menunggu Diproses
                    @endif
                </p>
                <small class="">{{ $pengajuan->created_at->format('H:i:s') }} WIB</small> <br>
                <small>Pengajuan Surat berhasil dikirim. Mohon tunggu, Surat akan segera diproses!</small>
            </li>

        </ul>
    </section>
    <!-- Section: Timeline -->
</div>