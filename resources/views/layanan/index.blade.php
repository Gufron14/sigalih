@extends('.components.app-layout')
@section('title', 'Layanan Online')

@section('content')
    <div class="container mt-5">
        <div class="row justify-content-between mb-5">
            <div class="col">
                <h2 class="fw-bold">Layanan</h2>
            </div>
            <div class="col d-flex align-items-center justify-content-end">
                <form class="d-flex w-100" role="search">
                    <input class="form-control form-control-lg me-2" type="search" placeholder="Cari layanan"
                        aria-label="Search">
                    <button class="btn btn-outline-success" type="submit">Cari</button>
                </form>
            </div>
        </div>

        <label for="" class="form-label">Pilih Surat Permohonan</label>
        <select class="form-select form-select-lg" id="pilihSurat" onchange="tampilkanForm()">
            <option value="" class="text-muted">Pilih Surat Permohonan</option>
            <option value="keteranganDomisili">Surat Permohonan Keterangan Domisili</option>
            <option value="SKCK">Surat Permohonan SKCK</option>
            <option value="aktaKelahiran">Surat Permohonan Akta Kelahiran</option>
        </select>


        <div id="formKeteranganDomisili" class="mt-5" style="display: none;">
            @include('layanan._ket-domisili')
        </div>

        <div id="formSKCK" class="mt-5" style="display: none;">
            <div class="card">
                <div class="card-header bg-primary">
                    <div class="card-title fw-bold text-white">Surat Permohonan SKCK</div>
                </div>
                <div class="card-body">
                    <label for="" class="form-label">Nama Lengkap</label>
                    <input type="text" class="form-control">
                </div>
                <div class="d-flex justify-content-end mb-3 gap-3 me-3">
                    <a href="" class="btn btn-success fw-bold">Buat Surat</a>
                    <a href="" class="btn btn-danger fw-bold">Batal</a>
                </div>
            </div>
        </div>

        <div id="formAktaKelahiran" class="mt-5" style="display: none;">
            <div class="card">
                <div class="card-header bg-primary">
                    <div class="card-title fw-bold text-white">Surat Permohonan Akta Kelahiran</div>
                </div>
                <div class="card-body">
                    <label for="" class="form-label">Nama Lengkap</label>
                    <input type="text" class="form-control">
                </div>
                <div class="d-flex justify-content-end mb-3 gap-3 me-3">
                    <a href="" class="btn btn-success fw-bold">Buat Surat</a>
                    <a href="" class="btn btn-danger fw-bold">Batal</a>
                </div>
            </div>
        </div>

    </div>

    <script>
        function tampilkanForm() {
            var pilihan = document.getElementById("pilihSurat").value;

            // Sembunyikan semua formulir
            document.getElementById("formKeteranganDomisili").style.display = "none";
            document.getElementById("formSKCK").style.display = "none";
            document.getElementById("formAktaKelahiran").style.display = "none";

            // Tampilkan formulir yang sesuai dengan pilihan
            if (pilihan === "keteranganDomisili") {
                document.getElementById("formKeteranganDomisili").style.display = "block";
            } else if (pilihan === "SKCK") {
                document.getElementById("formSKCK").style.display = "block";
            } else if (pilihan === "aktaKelahiran") {
                document.getElementById("formAktaKelahiran").style.display = "block";
            }
        }
    </script>


@endsection
