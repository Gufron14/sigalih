<div class="mt-4">
    <div class="card">
        <div class="card-header">
            <h5 class="card-title">
                Detail {{ $nasabah->warga->nama }}
            </h5>
        </div>
        <div class="card-body">
            <table class="table table-sm table-striped">
                <tbody>
                    <tr>
                        <td>Nama Lengkap</td>
                        <td>: {{ $nasabah->warga->nama }}</td>
                    </tr>
                    <tr>
                        <td>Alamat</td>
                        <td>: {{ $nasabah->warga->alamat }},
                            RT. {{ $nasabah->warga->rt }},
                            RW. {{ $nasabah->warga->rw }}
                        </td>
                    </tr>
                    <tr>
                        <td>Tempat, tanggal lahir</td>
                        <td>: {{ $nasabah->warga->ttl }}</td>
                    </tr>
                    <tr>
                        <td>Jenis Kelamin</td>
                        <td>: {{ $nasabah->warga->jk }}</td>
                    </tr>
                    {{-- <tr>
                        <td>Grand Total Pendapatan</td>
                        <td>: {{ $pendapatan->total_pendapatan }}</td>
                    </tr> --}}
                </tbody>
            </table>
        </div>
    </div>
</div>
