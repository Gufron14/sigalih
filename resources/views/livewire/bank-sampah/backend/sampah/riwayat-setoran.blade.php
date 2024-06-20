<div>
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
                        @isset($groupedSetorans)
                        @forelse ($groupedSetorans as $nasabahId => $setorans)
                            @php
                                $rowCount = $setorans->count();
                                $nasabah = $nasabahs->firstWhere('id', $nasabahId);
                            @endphp
                            @foreach ($setorans as $index => $setoran)
                                <tr>
                                    @if ($index === 0)
                                        <td rowspan="{{ $rowCount }}">{{ $setoran->created_at->format('d-m-Y') }}</td>
                                        <td rowspan="{{ $rowCount }}">{{ $nasabah->name }}</td>
                                    @endif
                                    <td>{{ $setoran->jenisSampah->jenis_sampah }}</td>
                                    <td>{{ (int) $setoran->berat_sampah }} Kg</td>
                                    @if ($index === 0)
                                        <td rowspan="{{ $rowCount }}">{{ $totalBerat[$nasabahId] }} Kg</td>
                                        <td rowspan="{{ $rowCount }}">@currency($totalPendapatan[$nasabahId])</td>
                                    @endif
                                    <td>
                                        @if ($setoran->jenis_transaksi == 'tabung')
                                            <div class="badge bg-info-faded text-capitalize text-dark"> {{ $setoran->jenis_transaksi }}</div>
                                        @else
                                            <div class="badge bg-success-faded text-capitalize text-light"> {{ $setoran->jenis_transaksi }}</div>
                                        @endif
                                    </td>
                                    <td>
                                        <a href="" class="btn btn-secondary-faded btn-sm text-dark">
                                            <i class="bi bi-eye-fill me-2"></i>Detail
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                        @empty
                            <tr>
                                <td colspan="9">Tidak ada data</td>
                            </tr>
                        @endforelse
                        @endisset
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
</div>
