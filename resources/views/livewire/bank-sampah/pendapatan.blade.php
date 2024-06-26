<div>
    <div class="mb-3">
        <h5 class="text-success fw-bold">Riwayat Setor Sampah</h5>
    </div>

    <div class="table-responsive">
        <table class="table align-middle table-sm table-bordered">
            <thead class="table-success">
                <tr class="text-center">
                    <th>Jenis Sampah</th>
                    <th>Berat</th>
                    <th>Pendapatan</th>
                    <th>Total Berat</th>
                    <th>Total Pendapatan</th>
                    <th>Transaksi</th>
                    <th>Tanggal</th>
                </tr>
            </thead>
            <tbody class="text-center">
                @php
                    $grandTotalPendapatan = 0;
                    $grandTotalBerat = 0;
                @endphp
                @foreach ($riwayatSetorans as $riwayatSetoran)
                    @php
                        $rowCount = $riwayatSetoran->riwayatSetoranDetails->count();
                        $grandTotalPendapatan += $riwayatSetoran->total_pendapatan;
                        $grandTotalBerat += $riwayatSetoran->total_berat_sampah;
                    @endphp
                    @forelse ($riwayatSetoran->riwayatSetoranDetails as $index => $detail)
                        <tr>
                            <td class="text-start">{{ $detail->jenisSampah->jenis_sampah }}</td>
                            <td>{{ (float) $detail->berat_sampah }} Kg</td>
                            <td>@currency($detail->pendapatan)</td>
                            @if ($index === 0)
                                <td rowspan="{{ $rowCount }}">{{ (float) $riwayatSetoran->total_berat_sampah }} Kg</td>
                                <td rowspan="{{ $rowCount }}">@currency($riwayatSetoran->total_pendapatan)</td>
                                <td rowspan="{{ $rowCount }}">
                                    @if ($riwayatSetoran->jenis_transaksi == 'tabung')
                                        <span class="badge text-bg-primary text-capitalize">
                                            {{ $riwayatSetoran->jenis_transaksi }}
                                        </span>
                                    @elseif ($riwayatSetoran->jenis_transaksi == 'tunai')
                                        <span class="badge text-bg-success text-capitalize">
                                            {{ $riwayatSetoran->jenis_transaksi }}
                                        </span>
                                    @endif
                                </td>
                                <td rowspan="{{ $rowCount }}">{{ $riwayatSetoran->created_at->format('d/m/Y') }}</td>
                            @endif
                        </tr>
                    @empty
                        <td colspan="7" class="text-center p-5">Belum ada Riwayat.</td>
                    @endforelse
                @endforeach
            </tbody>
        </table>
    </div>

    <div class="d-flex gap-3 float-end">
        <div class="card shadow-sm">
            <div class="card-body">
                <h6 class="fw-bold text-success">Grand Total Berat Sampah</h6>
                <h4 class="fw-bold">{{ (float) $grandTotalBerat }} Kg</h4>
            </div>
        </div>
        <div class="card shadow-sm">
            <div class="card-body">
                <h6 class="fw-bold text-success">Grand Total Pendapatan</h6>
                <h4 class="fw-bold">@currency($grandTotalPendapatan)</h4>
            </div>
        </div>
    </div>
</div>
