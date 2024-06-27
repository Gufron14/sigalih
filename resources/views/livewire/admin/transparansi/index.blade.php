<div>
    @section('breadcrumbs')
        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
        <li class="breadcrumb-item active">Kelola Transparansi</li>
    @endsection

    @if (session()->has('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h4 class="card-title fw-bold">Data Transparansi</h4>
            <a href="{{ route('createTransparan') }}" class="btn btn-primary btn-sm fw-bold">
                <i class="fas fa-plus-circle me-2"></i>Tambah Data
            </a>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table">
                    <thead>
                        <th>No</th>
                        <th>Keterangan</th>
                        <th>Tahun</th>
                        <th>Deskripsi</th>
                        <th class="text-center">File</th>
                        <th>Infografik</th>
                        <th class="text-center">Aksi</th>
                    </thead>
                    <tbody>
                        @forelse ($transparansis as $transparansi)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $transparansi->keterangan }}</td>
                                <td>{{ $transparansi->tahun }}</td>
                                <td>{{ $transparansi->desc }}</td>
                                <td>
                                    <a href="{{ Storage::url($transparansi->dokumen) }}" target="_blank" download>
                                        <i class="fas fa-file-pdf"></i> {{ basename($transparansi->dokumen) }}
                                    </a>
                                </td>
                                <td wire:key='{{ $transparansi->infografik }}'>
                                    <img src="{{ Storage::url($transparansi->infografik) }}" alt="" width="100px">
                                </td>
                                <td>
                                    <a href="{{ route('updateTransparan', $transparansi->id) }}" class="btn btn-sm btn-secondary-faded">
                                        <i class="fas fa-edit text-primary"></i>
                                    </a>
                                    <button class="btn btn-sm btn-secondary-faded" 
                                        wire:confirm="Anda yakin ingin menghapus data ini?"
                                         wire:click="destroy({{ $transparansi->id }})">
                                        <i class="fas fa-trash text-danger"></i>
                                    </button>
                                </td>
                            @empty
                                <td colspan="7" class="text-danger text-center p-5">
                                    <p>Belum ada Data.</p>
                                    <a href="{{ route('createTransparan') }}" class="btn btn-primary btn-sm fw-bold">
                                        <i class="fas fa-plus-circle me-2"></i>Tambah Data
                                    </a>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
