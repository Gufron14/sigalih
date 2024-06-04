<div>
    @section('breadcrumbs')
        <li class="breadcrumb-item"><a href="{{ route('jenisSampah') }}">Sampah</a></li>
        <li class="breadcrumb-item active">Riwayat Setor Sampah</li>
    @endsection

    @section('button')
        <button class="btn btn-primary">
            Setor Sampah
        </button>
    @endsection

    <div class="card">
        <div class="card-header">
            <h4 class="card-title">
                Riwayat Setor Sampah
            </h4>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-sm">
                    <thead>
                        <th>Tanggal</th>
                        <th>Nama Nasabah</th>
                        <th>Sampah</th>
                        <th>Berat</th>
                        <th>Pendapatan</th>
                        <th>Total Berat</th>
                        <th>Total Pendapatan</th>
                        <th>Transaksi</th>
                        <th>Aksi</th>
                    </thead>
                    <tbody>
                        @forelse ($setorans as $setoran)
                            <tr>
                                <td>{{ $setoran->created_at->format('d-m-Y') }}</td>
                                <td>{{ $setoran->nasabah_id }}</td>
                                <td>{{ $setoran->JenisSampah->jenis_sampah }}</td>
                                <td>{{ (int) $setoran->berat_sampah }} Kg</td>
                                <td>@currency($setoran->pendapatan)</td>
                                <td>
                                    @if ($loop->first)
                                        {{ $totalBerat }} Kg
                                    @endif
                                </td>
                                <td>
                                    @if ($loop->first)
                                        @currency($totalPendapatan)
                                    @endif
                                </td>
                                <td>
                                    @if ($setoran->jenis_transaksi == 'tabung')
                                        <div class="badge bg-info text-dark">
                                            {{ $setoran->jenis_transaksi }}
                                </td>
            </div>
        @else
            <div class="badge bg-success text-light">
                {{ $setoran->jenis_transaksi }}</td>
            </div>
            @endif
            <td>
                <a href="">Detail</a>
            </td>
            </tr>
        @empty
            <tr>
                <td colspan="9">Tidak ada data</td>
            </tr>
            @endforelse
            </tbody>
            </table>
        </div>
    </div>
</div>
</div>
