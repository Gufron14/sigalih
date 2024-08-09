<div class="mt-4">
    @section('breadcrumbs')
        <li class="breadcrumb-item"><a href="{{ route('jenisSampah') }}">Sampah</a></li>
        <li class="breadcrumb-item active">Riwayat Setor Sampah</li>
    @endsection

    @section('button')
        <button class="btn btn-success-faded text-dark btn-sm">
            Setor Sampah
        </button>
    @endsection

    <div class="card">
        <div class="card-header">
            <h5 class="card-title">
                Riwayat Setor Sampah
            </h5>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-sm table-bordered">
                    <thead>
                        <tr class="text-center">
                            <th>Jenis Sampah</th>
                            <th>Berat</th>
                            <th>Pendapatan</th>
                            <th>Nama</th>
                            <th>Total Berat</th>
                            <th>Total Pendapatan</th>
                            <th>Transaksi</th>
                            <th>Tanggal</th>
                        </tr>
                    </thead>
                    <tbody>
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
                            @foreach ($riwayatSetoran->riwayatSetoranDetails as $index => $detail)
                                <tr>
                                    <td class="text-start">{{ $detail->jenisSampah->jenis_sampah }}</td>
                                    <td>{{ (float) $detail->berat_sampah }} Kg</td>
                                    <td>@currency($detail->pendapatan)</td>
                                    @if ($index === 0)
                                        <td rowspan="{{ $rowCount }}" class="text-start">{{ $riwayatSetoran->nama_warga }}</td>
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
                            @endforeach
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
</div>
