<div>
    @if (session()->has('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    {{-- @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif --}}
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h5 class="fw-bold">Daftar Warga</h5>
                    <div class="d-flex gap-3 align-items-center">
                        <a href="{{ route('addWarga') }}" class="btn btn-sm btn-primary fw-bold">
                            <i class="bi bi-plus-circle me-1"></i> Tambah Data</a>

                        {{-- <form class="d-flex" role="search">
                            <input class="form-control me-2" type="search" placeholder="Cari"
                                wire:model.debounce.500ms="search" />
                            <!-- Tombol submit dihapus -->
                        </form> --}}
                    </div>
                </div>
                <div class="card-body">
                    <form wire:submit.prevent="import" enctype="multipart/form-data">
                        <div class="d-flex gap-1 align-items-center justify-content-between">
                            {{-- <div class="">
                                <select wire:model="perPage" class="form-select">
                                    <option value="5">5 Entries</option>
                                    <option value="10">10 Entries</option>
                                    <option value="15">15 Entries</option>
                                    <option value="20">20 Entries</option>
                                </select>
                            </div> --}}
                            <div class="d-flex gap-1 align-items-center">
                                <input type="file" class="form-control" wire:model="file">
                                @error('file')
                                    <small class="text-danger">
                                        {{ $message }}
                                    </small>
                                @enderror

                                <button type="submit" class="btn btn-sm btn-warning"><i
                                        class="bi bi-table me-1"></i>Import</button>
                                    </div>
                                </div>
                            </form>
                            <button class="btn btn-sm btn-success text-white" wire:click="export"><i
                                    class="bi bi-download me-1"></i>Export</button>
                    <div class="table-responsive mt-4">
                        <table class="table table-bordered table-sm table-striped">
                            <thead>
                                <th class="text-center">#</th>
                                <th>NIK</th>
                                <th>Nama</th>
                                <th>TTL</th>
                                <th>JK</th>
                                <th>Dusun</th>
                                <th>RT</th>
                                <th>RW</th>
                                <th>Desa</th>
                                <th>Kecamatan</th>
                                <th>Kab./Kota</th>
                                <th>Agama</th>
                                <th>Status</th>
                                <th>Pekerjaan</th>
                            </thead>
                            <tbody>
                                @forelse ($wargas as $warga)
                                    <tr>
                                        <td class="text-center">
                                            <!-- Button trigger modal -->
                                            {{-- <button type="button" class="btn btn-sm btn-light" data-bs-toggle="modal"
                                                data-bs-target="#exampleModal">
                                                <i class="fas fa-edit text-primary"></i>
                                            </button> --}}
                                            <a href="{{ route('updateWarga', $warga->id) }}">
                                                <i class="fas fa-edit text-primary"></i>
                                            </a>
                                        </td>
                                        <td><small>{{ $warga->nik }}</small></td>
                                        <td class="text-uppercase"><small>{{ $warga->nama }}</small></td>
                                        <td><small>{{ $warga->ttl }}</small></td>
                                        <td><small>{{ $warga->jk }}</small></td>
                                        <td><small>{{ $warga->alamat }}</small></td>
                                        <td><small>{{ $warga->rt }}</small></td>
                                        <td><small>{{ $warga->rw }}</small></td>
                                        <td><small>{{ $warga->desa }}</small></td>
                                        <td><small>{{ $warga->kec }}</small></td>
                                        <td><small>{{ $warga->kab }}</small></td>
                                        <td class="text-capitalize"><small>{{ $warga->agama }}</small></td>
                                        <td><small>{{ $warga->status }}</small></td>
                                        <td><small>{{ $warga->pekerjaan }}</small></td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="14" class="text-center p-5 text-muted">Tidak ada data</td>
                                    </tr>
                                @endforelse

                                <!-- Modal -->
                                <div class="modal fade" id="exampleModal" tabindex="-1"
                                    aria-labelledby="exampleModalLabel" aria-hidden="true" data-bs-backdrop="static">
                                    <div class="modal-dialog modal-dialog-centered">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h1 class="modal-title fs-5" id="exampleModalLabel">Masukan Password
                                                </h1>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            {{-- <form wire:submit.prevent="verifyPassword({{ $warga->id }})">
                                                <div class="modal-body">
                                                    <label for="password" class="form-label">Password Admin</label>
                                                    <input type="password"
                                                        class="form-control @error('password') is-invalid @enderror"
                                                        placeholder="Masukan Password" wire:model="password">
                                                    @error('password')
                                                        <small>
                                                            <span class="text-danger">{{ $message }}</span>
                                                        </small>
                                                    @enderror
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary"
                                                        data-bs-dismiss="modal">Batal</button>
                                                    <button type="submit" class="btn btn-primary">Edit
                                                        Sekarang</button>
                                                </div>
                                            </form> --}}
                                        </div>
                                    </div>
                                </div>
                            </tbody>
                        </table>
                        <div>
                            {{ $wargas->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @push('scripts')
        <script>
            $(function() {
                var table = $('#usersTable').DataTable({
                    processing: true,
                    serverSide: true,
                    ajax: "{{ url()->current() }}",
                    columns: [{
                            data: 'DT_RowIndex',
                            name: 'DT_RowIndex'
                        },
                        {
                            data: 'nik',
                            name: 'nik'
                        },
                        {
                            data: 'email',
                            name: 'email'
                        },
                        // {data: 'action', name: 'action', orderable: true, searchable: true},
                    ]
                });
            });
        </script>
    @endpush
</div>
