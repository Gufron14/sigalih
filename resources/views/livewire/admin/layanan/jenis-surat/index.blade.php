@section('breadcrumbs')
    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
    <li class="breadcrumb-item active">Manajemen Surat</li>
@endsection

@if (session()->has('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

{{-- BODY --}}
<div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h5 class="card-title">
                Daftar Surat
            </h5>
            <a href="{{ route('createSurat') }}" class="btn btn-primary btn-sm fw-bold">
                <i class="fas fa-plus-circle me-2"></i> Tambah Jenis Surat
            </a>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-sm">
                    <thead>
                        <th class="text-center">No</th>
                        <th>Nama Surat</th>
                        <th>Singkatan</th>
                        <th>Deskripsi</th>
                        <th class="text-center">Aksi</th>
                    </thead>
                    <tbody>
                        @forelse ($jenisSurats as $jenis_surat)
                            <tr>
                                <td class="text-center">{{ $loop->iteration }}</td>
                                <td>{{ $jenis_surat->nama_surat }}</td>
                                <td>
                                    <span class="badge bg-primary-faded text-primary text-uppercase">
                                        {{ $jenis_surat->singkatan }}
                                </td>
                                </span>
                                <td>{{ $jenis_surat->desc }}</td>
                                <td class="text-center">
                                    <a href="{{ route('updateSurat', $jenis_surat->id) }}"
                                        class="btn btn-secondary-faded btn-sm">
                                        <i class="fas fa-edit text-primary fs-6"></i>
                                    </a>
                                    <button type="submit" 
                                    wire:confirm="Are you sure you want to delete this item?"
                                        wire:click="destroy({{ $jenis_surat->id }})"
                                        class="btn btn-secondary-faded btn-sm">
                                        <i class="bi bi-trash-fill text-danger fs-6"></i>
                                    </button>
                                </td>
                            @empty
                                <td colspan="5" class="text-danger text-center p-5">Belum ada Surat.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
