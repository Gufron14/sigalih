<div class="container">
    <ul class="nav justify-content-center" role="tablist">
        <li class="nav-item" role="presentation">
            <a class="btn btn-light" id="icon-tab-0" data-bs-toggle="tab" href="#icon-tabpanel-0" role="tab"
                aria-controls="icon-tabpanel-0" aria-selected="true">Penukaran Saldo</a>
        </li>
        <li class="nav-item" role="presentation">
            <a class="btn btn-light" id="icon-tab-1" data-bs-toggle="tab" href="#icon-tabpanel-1" role="tab"
                aria-controls="icon-tabpanel-1" aria-selected="false">Riwayat Penukaran</a>
        </li>
    </ul>

    <div class="tab-content pt-5" id="tab-content">
        {{-- Penukaran --}}
        <div class="tab-pane active" id="icon-tabpanel-0" role="tabpanel" aria-labelledby="icon-tab-0">
            <div class="row row-cols-1 row-cols-md-4 g-4">
                <div class="col">
                    <div class="card shadow h-100">
                        <div class="ratio ratio-4x3">
                            <img src="https://www.internetcepat.id/wp-content/uploads/2022/10/wifi-g5a819918d_1280-730x400.jpg"
                                class="card-img-top object-fit-cover" alt="...">
                        </div>
                        <div class="card-body d-flex flex-column justify-content-between">
                            <div class="mb-3">
                                <h5 class="card-title fw-bold text-success">Voucher WiFi 2 Jam (1 Hari)</h5>
                                <small class="">Some quick example text to build on the card title and make up the
                                    bulk of the card's content.</small>
                            </div>
                            <button class="btn btn-warning fw-bold w-100 mt-auto" data-bs-toggle="modal"
                                data-bs-target="#staticBackdrop">Rp. 2.000</button>
                        </div>
                        <!-- Modal -->
                        <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false"
                            tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h1 class="modal-title fs-5" id="staticBackdropLabel">Penukaran Saldo</h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary"
                                            data-bs-dismiss="modal">Batal</button>
                                        <button type="button" class="btn btn-primary">Tukar Saldo</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card shadow h-100">
                        <div class="ratio ratio-4x3">
                            <img src="https://kliklogistics.co.id/wp-content/uploads/2023/07/distribusi-sembako.jpg"
                                class="card-img-top object-fit-cover" alt="...">
                        </div>
                        <div class="card-body d-flex flex-column justify-content-between">
                            <div class="mb-3">
                                <h5 class="card-title fw-bold text-success">Voucher Sembako</h5>
                                <small class="">Some quick example text to build on the card title and make up the
                                    bulk of the card's content.</small>
                            </div>
                            <a href="" class="btn btn-warning fw-bold w-100 mt-auto">Rp. 20.000</a>
                        </div>

                    </div>
                </div>
                <div class="col">
                    <div class="card shadow h-100">
                        <div class="ratio ratio-4x3">
                            <img src="https://blue.kumparan.com/image/upload/fl_progressive,fl_lossy,c_fill,q_auto:best,w_640/v1634025439/01gctzhh3xfrebyyx41sjb42g1.jpg"
                                class="card-img-top object-fit-cover" alt="...">
                        </div>
                        <div class="card-body d-flex flex-column justify-content-between">
                            <div class="mb-3">
                                <h5 class="card-title fw-bold text-success">Voucher Axis 1GB (5 Hari)</h5>
                                <small class="">Some quick example text to build on the card title and make up the
                                    bulk of the card's content.</small>
                            </div>
                            <a href="" class="btn btn-warning fw-bold w-100 mt-auto">Rp. 15.000</a>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card shadow h-100">
                        <div class="ratio ratio-4x3">
                            <img src="https://assets.promediateknologi.id/crop/0x0:0x0/750x500/webp/photo/2023/07/14/Warung-Madura-2423018263.jpg"
                                class="card-img-top object-fit-cover" alt="...">
                        </div>
                        <div class="card-body d-flex flex-column justify-content-between">
                            <div class="mb-3">
                                <h5 class="card-title fw-bold text-success">Voucher Belanja Rp. 20.000</h5>
                                <small class="">Some quick example text to build on the card title and make up the
                                    bulk of the card's content.</small>
                            </div>
                            <a href="" class="btn btn-warning fw-bold w-100 mt-auto">Rp. 21.000</a>
                        </div>

                    </div>
                </div>
            </div>
        </div>

        {{-- Riwayat --}}
        <div class="tab-pane" id="icon-tabpanel-1" role="tabpanel" aria-labelledby="icon-tab-1">
            <div class="card shadow card-primary card-outline w-50 mx-auto mb-4">
                <div class="card-body">
                    <div class="row justify-content-beetwen align-items-center">
                        <div class="col ">
                            <h5 class="fw-bold text-success">
                                Voucher Wifi
                            </h5>
                            <p class="fw-bold">Rp. 2.000;-</p>
                            <small class="text-secondary"><i class="fas fa-calendar-alt"></i> &nbsp;
                                19/05/2024</small>
                        </div>
                        <div class="col-5 ">
                            <p class="badge text-bg-success">Selesai</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card shadow card-primary card-outline w-50 mx-auto mb-3">
                <div class="card-body">
                    <div class="row justify-content-beetwen align-items-center">
                        <div class="col ">
                            <h5 class="fw-bold text-success">
                                Voucher Sembako
                            </h5>
                            <p class="fw-bold">Rp. 20.000;-</p>
                            <small class="text-secondary"><i class="fas fa-calendar-alt"></i> &nbsp;
                                19/05/2024</small>
                        </div>
                        <div class="col-5 ">
                            <p class="badge text-bg-danger">Gagal</p> <br>
                            <small class="text-secondary">Saldo tidak mencukupi</small>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>



</div>
