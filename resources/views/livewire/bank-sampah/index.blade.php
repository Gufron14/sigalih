<div class="container">
    <div class="row justify-content-between mb-3 g-5">
        <div class="col">
            <div class="d-flex align-middle">
                <h2 class="text-success fw-bold align-middle">Hei, {{ $warga->nama }}! <br> Sudahkah Lingkunganmu
                    Bersih?</h2>
            </div>
            <p>Bersihkan lingkunganmu, untuk masa depan Sehat.</p>
            <a href="{{ route('panduan') }}" class="btn text-white fw-bold rounded-5 card-grow" style="background-image: linear-gradient(to right, #0a9659 0%, #3cba53 100%);">Lihat Panduan <i
                    class="fas fa-paper-plane ms-2"></i> </a>

            {{-- Carousel --}}
            <div id="carouselExampleInterval" class="my-5 carousel slide" data-bs-ride="carousel">
                <div class="carousel-inner">
                    <div class="carousel-item active " data-bs-interval="10000">
                        <div class="ratio ratio-16x9">
                            <img src="https://sumberrejosid.slemankab.go.id/assets/files/artikel/sedang_1659622564Gambar%20untuk%20Artikel%20Bank%20Sampah.jpg"
                                class="d-block w-100 object-fit-cover" alt="...">
                        </div>
                    </div>
                    <div class="carousel-item" data-bs-interval="2000">
                        <div class="ratio ratio-16x9">
                            <img src="https://lh3.googleusercontent.com/proxy/7UAFfsRXfq6V1hSRkua8HsBIpSvXJTCF5xXdlPw7Z0AyYmGC-fIK_HCQgK1mZqpyNRzUqE1ho_MR-7STD9l2tAKEiIancHJLRDB_xZ7_ZJ4spMhTFWHwGZP4PclXwm9vxjHb1OIZ0JPcfZPQ6eHJ4RqHV6Y"
                                class="d-block w-100 object-fit-cover" alt="...">
                        </div>
                    </div>
                    <div class="carousel-item">
                        <div class="ratio ratio-16x9">
                            <img src="https://dlh.bulelengkab.go.id/public/uploads/konten/apa-itu-bank-sampah-26.jpg"
                                class="d-block w-100 object-fit-cover" alt="...">
                        </div>
                    </div>
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleInterval"
                    data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleInterval"
                    data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
            </div>

        </div>

        <div class="col">
            {{-- TOTAL SALDO --}}
            <div class="card card-grow card-bg2 mb-3 shadow-sm">
                <div class="card-body">
                    <div class="row align-items-center">
                        <div class="col ms-3">
                            <div class="">
                                Saldo Kamu
                            </div>
                            <h2 class="fw-bold">
                                Rp. 16.000;-
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
            <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">s
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="exampleModalLabel">Tarik Saldo</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form action="">
                                <div class="mb-3">
                                    <label for="" class="form-label">Nominal Penarikan</label>
                                    <input type="text" class="form-control form-control-lg" placeholder="contoh: 10000">
                                </div>
                            </form>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                            <button type="button" class="btn btn-primary fw-bold" onclick="showTarikSaldo()">Tarik Saldo</button>
                        </div>
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
                                <h5 class="fw-bold">Rp. 16.000;-</h5>
                            </div>
                        </div>
                        <div class="col d-flex justify-content-center">
                            <div class="text-center">
                                <small>Pengeluaran</small>
                                <h5 class="fw-bold">Rp. 20.000;-</h5>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Minggu, Bulan, Tahun --}}
            <div class="row row-cols-1 row-cols-md-3 g-4 mb-3">
                <div class="col">
                    <div class="card card-grow border-success shadow-sm">
                        <div class="card-body text-success">
                            <small> Minggu ini </small>
                            <h5 class="fw-bold">Rp. 10.000;-</h5>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card card-grow border-success shadow-sm">
                        <div class="card-body text-success">
                            <small> Bulan ini </small>
                            <h5 class="fw-bold">Rp. 20.000;-</h5>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card card-grow border-success shadow-sm">
                        <div class="card-body text-success">
                            <small> Tahun ini </small>
                            <h5 class="fw-bold">Rp. 30.000;-</h5>
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

    <div>
        <div class="d-flex justify-content-between align-items-center mb-3 text-success">
            <h4 class="fw-bold">Pendapatan Terakhir</h4>
            <a href="{{ route('riwayat') }}">Semua Riwayat &nbsp;<i class="fas fa-arrow-right"></i></a>
        </div>
        <div class="table-responsive">
            <table class="table align-middle table-sm table-bordered">
                <thead class="table-success">
                    <tr class="text-center">
                        <th>Tanggal</th>
                        <th>Jenis Sampah</th>
                        <th>Jumlah (Kg)</th>
                        <th>Harga/Kg</th>
                        <th>Jumlah</th>
                        <th>Total Pendapatan</th>
                        <th>Transaksi</th>
                    </tr>
                </thead>
                <tbody class="text-center">
                    <tr>
                        <td rowspan="2">11/05/24</td>
                        <td>Besi</td>
                        <td>4 Kg</td>
                        <td>Rp. 3.000</td>
                        <td>Rp. 12.000</td>
                        <td class="fw-bold" rowspan="2">Rp. 16.000;-</td>
                        <td rowspan="2">
                            <div class="badge text-bg-primary"> Ditabung </div>
                        </td>
                    </tr>
                    <tr>

                        <td>Kardus</td>
                        <td>2 Kg</td>
                        <td>Rp. 2.000</td>
                        <td>Rp. 4.000</td>

                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>


