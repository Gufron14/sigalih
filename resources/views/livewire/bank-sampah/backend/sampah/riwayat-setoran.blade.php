@section('breadcrumbs')
    <li class="breadcrumb-item"><a href="{{ route('jenisSampah') }}">Sampah</a></li>
    <li class="breadcrumb-item active">Riwayat Setor Sampah</li>
@endsection

@section('button')
    <button class="btn btn-success-faded text-dark btn-sm">
        Setor Sampah
    </button>
@endsection

<div>
    <div class="card mb-3">
        <div class="card-header">
            <h5 class="card-title">
                Riwayat Setor Sampah
            </h5>
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
                                @foreach ($nasabahs as $nasabah)
                                    <td>{{ $nasabah->user->warga->nama }}</td>
                                @endforeach
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
                                        <div class="badge bg-info text-dark text-capitalize">
                                            {{ $setoran->jenis_transaksi }}
                                    @else
                                        <div class="badge bg-success text-light text-capitalize">
                                            {{ $setoran->jenis_transaksi }}</td>
                                        </div>
                                    @endif
                                </td>
                                <td>
                                    <a href="" class="btn btn-sm btn-secondary-faded text-primary">
                                        <i class="fas fa-user text-primary me-2"></i>Lihat
                                    </a>
                                </td>
                        @empty
                                <td colspan="9" class="text-center">Tidak ada data</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
