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

        <div class="card">
            <div class="card-body">
                <div class="mb-3">
                   Pilih Surat
                </div>
                {{-- <form action="{{ route('pengajuan.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <select name="id_surat" id="id_surat" class="form-select mb-3">
                        @foreach ($surats as $surat)
                            <option value="{{ $surat->id_surat}}">{{ $surat->nama_surat }}</option>
                        @endforeach
                    </select>
                    <div class="mb-3">
                        <label for="nik" class="form-label">Masukan NIK</label>
                        <input type="text" name="nik" id="nik" placeholder="Masukan NIK untuk membuat Permohonan" class="form-control">
                    </div>
                    <button type="submit" class="btn btn-primary">Buat</button>
                </form> --}}
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
