<div class="mt-4">
    @section('breadcrumbs')
        <li class="breadcrumb-item"><a href="">Dashboard</a></li>
        <li class="breadcrumb-item active">Setor Sampah</li>
    @endsection

    @section('button')
        <a href="{{ route('riwayatSetoran') }}" class="btn btn-primary btn-sm fw-bold">Riwayat Setoran</a>
    @endsection

    @if (session()->has('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <div class="card">
        <div class="card-body">
            <form wire:submit.prevent="store" enctype="multipart/form-data">
                <div class="row">
                    <div class="col">
                        <label for="" class="form-label">Nama Nasabah</label>
                        <select class="form-select" aria-label="Default select example" wire:model="nasabahId">
                            <option selected>Pilih Nama Nasabah</option>
                            @foreach ($nasabahs as $nasabah)
                                <option value="{{ $nasabah->id }}">{{ $nasabah->warga->nama }}</option>
                            @endforeach
                        </select>
                        @error('nasabahId') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="col">
                        <label for="" class="form-label">Transaksi</label>
                        <select class="form-select mb-3" aria-label="Default select example"
                            wire:model="jenisTransaksi">
                            <option selected>Pilih Jenis Transaksi</option>
                            <option value="tabung">Tabung</option>
                            <option value="tunai">Tunai</option>
                        </select>
                        @error('jenisTransaksi') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>
                </div>

                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <th class="text-center"><input class="form-check-input" type="checkbox"
                                    wire:model.live="selectAll" id="selectAll"></th>
                            <th>Jenis Sampah</th>
                            <th>Harga/Kg</th>
                            <th>Berat (Kg)</th>
                            <th>Pendapatan</th>
                        </thead>
                        <tbody>
                            @foreach ($sampahs as $sampah)
                                <tr>
                                    <td class="text-center">
                                        <input class="form-check-input" type="checkbox"
                                            wire:model.live.debounce.250ms="checkedRows.{{ $sampah->id }}"
                                            id="flexCheckDefault-{{ $sampah->id }}">
                                    </td>
                                    <td>
                                        <div class="form-check">
                                            <label class="form-check-label" for="flexCheckDefault-{{ $sampah->id }}">
                                                {{ $sampah->jenis_sampah }}
                                            </label>
                                        </div>
                                    </td>
                                    <td>
                                        @currency($sampah->harga_per_kg)
                                    </td>
                                    <td>
                                        <input type="number" class="form-control form-control-sm"
                                            wire:model.live.debounce.250ms="inputs.{{ $sampah->id }}.berat"
                                            min="0" step="0.01">
                                    </td>
                                    <td>
                                        <input type="text" class="form-control form-control-sm"
                                            value="@currency($inputs[$sampah->id]['pendapatan'])" readonly>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                        <tfoot>
                            <tr>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td>
                                    <label for="" class="form-label">Total Berat Sampah</label>
                                    <h5 class="fw-bold">{{ $totalBerat }} Kg</h5>
                                </td>
                                <td>
                                    <label for="" class="form-label"> Total Pendapatan</label>
                                    <h5 class="fw-bold">@currency($totalPendapatan)</h5>
                                </td>
                            </tr>
                        </tfoot>
                    </table>
                    <button type="submit" class="btn btn-primary fw-bold">
                        <i class="fas fa-save me-2"></i>Setor Sampah</button>
                </div>
            </form>

        </div>
    </div>
</div>
