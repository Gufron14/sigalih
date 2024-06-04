<div class="mt-5">

    <ul class="nav justify-content-center" role="tablist">
        <li class="nav-item" role="presentation">
            <a class="btn btn-light" id="icon-tab-0" data-bs-toggle="tab" href="#icon-tabpanel-0"
                role="tab" aria-controls="icon-tabpanel-0" aria-selected="true">Pendapatan</a>
        </li>
        <li class="nav-item" role="presentation">
            <a class="btn btn-light" id="icon-tab-1" data-bs-toggle="tab" href="#icon-tabpanel-1" role="tab"
                aria-controls="icon-tabpanel-1" aria-selected="false">Penarikan Saldo</a>
        </li>
    </ul>

    <div class="tab-content pt-5" id="tab-content">

        {{-- Pendapatan --}}
        <div class="tab-pane active" id="icon-tabpanel-0" role="tabpanel" aria-labelledby="icon-tab-0">
            <div class="mb-3">
                <h5 class="text-success fw-bold">Pendapatan {{ $warga->nama }}</h5>
            </div>
        
            <div class="table-responsive">
                <table class="table align-middle table-sm table-bordered">
                    <thead class="table-success">
                        <tr class="text-center">
                            <th>Tanggal</th>
                            <th>Jenis Sampah</th>
                            <th>Berat</th>
                            <th>Harga/Kg</th>
                            <th>Pendapatan</th>
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
                        <tr>
                            <td rowspan="3">18/05/24</td>
                            <td>Besi</td>
                            <td>4 Kg</td>
                            <td>Rp. 3.000</td>
                            <td>Rp. 12.000</td>
                            <td class="fw-bold" rowspan="3">Rp. 20.000;-</td>
                            <td rowspan="3">
                                <div class="badge text-bg-success"> Tunai </div>
                            </td>
                        </tr>
                        <tr>
            
                            <td>Kardus</td>
                            <td>2 Kg</td>
                            <td>Rp. 2.000</td>
                            <td>Rp. 4.000</td>
            
                        </tr>
                        <tr>
            
                            <td>Plastik</td>
                            <td>2 Kg</td>
                            <td>Rp. 2.000</td>
                            <td>Rp. 4.000</td>
            
                        </tr>
                    </tbody>
                    <tfoot>
                        <tr class="text-center">
                            <td colspan="6" class="fw-bold">Jumlah Pendapatan Keseluruhan</td>
                            <td colspan="2" class="fw-bold">Rp. 36.000;-</td>
                        </tr>
                        <tr class="text-center">
                            <td colspan="6" class="fw-bold">Jumlah Pendapatan dalam Tabungan</td>
                            <td colspan="2" class="fw-bold">Rp. 16.000;-</td>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>

        {{-- Penarikan Saldo --}}
        <div class="tab-pane" id="icon-tabpanel-1" role="tabpanel" aria-labelledby="icon-tab-1">
            <div class="card shadow w-50 mx-auto mb-4">
                <div class="card-body">
                    <div class="row justify-content-beetwen align-items-center">
                        <div class="col ">
                            <h5 class="fw-bold text-success">
                                Voucher Wifi
                            </h5>
                            <p class="fw-bold">Rp. 2.000;-</p>
                            <small class="text-secondary"><i class="fas fa-calendar-alt"></i> &nbsp; 19/05/2024</small>
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
                            <small class="text-secondary"><i class="fas fa-calendar-alt"></i> &nbsp; 19/05/2024</small>
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
