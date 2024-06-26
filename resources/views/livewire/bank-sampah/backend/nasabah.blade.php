<div>
    <div class="card">
        <div class="card-header">
            <h4 class="card-title fw-bold">Data Nasabah</h4>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table">
                    <thead>
                        <th>No</th>
                        <th>Nasabah</th>
                        <th>Status</th>
                        <th class="text-center">Aksi</th>
                    </thead>
        
                    <tbody>
                        @foreach ($nasabahs as $nasabah)                            
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $nasabah->warga->nama }}</td>
                            <td>
                                <span class="badge text-bg-primary">Aktif</span>
                            </td>
                            <td class="text-center">Lihat</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
