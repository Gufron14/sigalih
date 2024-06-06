<div>
    @section('breadcrumbs')
        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
        <li class="breadcrumb-item active">Manajemen Surat</li>
    @endsection

    @section('button')
        <a href="{{ route('createSurat') }}" class="btn btn-primary">
            <i class="ri-add-circle-line align-bottom"></i> Tambah Jenis Surat
        </a>
    @endsection

    @if (session()->has('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    {{-- BODY --}}
    <div class="card">
        <div class="card-header">
            <h4 class="card-title">
                Daftar Surat
            </h4>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table">
                    <thead>
                        <th class="text-center">No</th>
                        <th>Nama Surat</th>
                        <th>Singkatan</th>
                        <th>Deskripsi</th>
                        <th class="text-center">Aksi</th>
                    </thead>
                    <tbody>
                        @forelse ($jenisSurat as $jenis_surat)
                            <tr>
                                <td class="text-center">{{ $loop->iteration }}</td>
                                <td>{{ $jenis_surat->nama_surat }}</td>
                                <td>
                                    <span class="badge bg-primary-faded text-primary">
                                        {{ $jenis_surat->singkatan }}</td>
                                    </span>
                                <td>{{ $jenis_surat->desc }}</td>
                                <td class="text-center">
                                    <button type="submit" wire:click="destroy({{ $jenis_surat->id }}"
                                        class="btn btn-danger">
                                        <i class="bi bi-trash-fill text-white"></i>
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
</div>
