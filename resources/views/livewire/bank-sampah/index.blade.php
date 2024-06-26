<div class="container">
    <div class="row justify-content-between mb-3 g-5">
        <div class="col">
            <div class="d-flex align-middle">
                <h2 class="text-success fw-bold align-middle">Hei, {{ $warga->nama }}🖐️ <br> Sudahkah Lingkunganmu
                    Bersih?</h2>
            </div>
            <div class="text-center">
                <img src="{{ asset('assets/img/people-recycling-concept.png') }}" width="400px" alt="petugas"
                    class="img-fluid">
            </div>
            <p>Bersihkan lingkunganmu, untuk masa depan Sehat.</p>
            <a href="{{ route('panduan') }}" class="btn text-white fw-bold rounded-5 card-grow"
                style="background-image: linear-gradient(to right, #0a9659 0%, #3cba53 100%);">Lihat Panduan <i
                    class="fas fa-paper-plane ms-2"></i> </a>
        </div>

        <div class="col">
            @if (session()->has('success'))
                <div class="alert alert-success">
                    <i class="fas fa-check-circle"></i> {{ session('success') }}
                </div>
            @elseif (session()->has('error'))
                <div class="alert alert-danger">
                    <i class="fas fa-exclamation-circle"></i> {{ session('error') }}
                </div>
            @endif
            {{-- TOTAL SALDO --}}
            <div class="card card-grow card-bg2 mb-3 shadow-sm">
                <div class="card-body">
                    <div class="row align-items-center">
                        <div class="col ms-3">
                            <div class="">
                                Saldo Kamu
                            </div>
                            <h2 class="fw-bold">
                                @currency($tabungan->saldo)
                            </h2>
                        </div>
                        <div class="col d-flex justify-content-center">
                            <!-- Button trigger modal -->
                            <button type="button" class="btn btn-warning fw-bold rounded-5" data-bs-toggle="modal"
                                data-bs-target="#staticBackdrop">
                                Tarik Saldo
                            </button>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Modal -->
            <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false"
                tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">s
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="exampleModalLabel">Tarik Saldo</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form wire:submit.prevent="tarikSaldo">
                                <div class="mb-3">
                                    <label for="nominal" class="form-label">Nominal Penarikan</label>
                                    <input type="text"
                                        class="form-control form-control-lg @error('nominal') is-invalid @enderror"
                                        wire:model.defer="nominal" id="nominal">
                                    @error('nominal')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="alert alert-warning">
                                    <small>Syarat & Ketentuan Penarikan Saldo</small>
                                    <small>
                                        <ol>
                                            <li>Tarik saldo minimal @currency(10000) & maksimal @currency(1000000).
                                            </li>
                                            <li>Uang akan diberikan setelah disetujui oleh Admin dan diserahkan pada
                                                pengambilan sampah berikutnya.</li>
                                        </ol>
                                    </small>
                                </div>
                        </div>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                            <button type="submit" class="btn btn-primary fw-bold">Tarik Saldo</button>
                        </div>
                        </form>
                    </div>
                </div>
            </div>

            {{-- Income Outcom --}}
            <div class="card card-grow shadow-sm mb-3">
                <div class="card-body">
                    <div class="row">
                        <div class="col d-flex justify-content-center">
                            <div class="text-center">
                                <small>Pemasukan</small>
                                <h5 class="fw-bold">@currency($tabungan->pemasukan)</h5>
                            </div>
                        </div>
                        <div class="col d-flex justify-content-center">
                            <div class="text-center">
                                <small>Pengeluaran</small>
                                <h5 class="fw-bold">@currency($tabungan->pengeluaran)</h5>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row mb-3">
                <div class="col">
                    <div class="card card-grow border-success shadow-sm">
                        <div class="card-body text-success text-center">
                            <h6>Hebat👏 <span class="fw-bold h5 text-success">{{ (int) $totalBeratSampah }} Kg</span>
                                Sampah, sudah kamu bersihkan.</h6>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Jadwal --}}
            <div class="row align-items-center justify-content-center p-3">
                <div class="col-6 text-center">
                    <small>Pengambilan sampah berikutnya:</small>
                    <div class="card-title fw-bold">
                        Minggu, 19 Mei 2024
                    </div>
                </div>
                <div class="col text-center">
                    <button class="btn btn-outline-success fw-bold rounded-5" onclick="showSweetAlert()">Ajukan
                        Pengambilan</button>
                </div>
            </div>

        </div>
    </div>

</div>
