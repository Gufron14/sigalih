<div>
    @section('breadcrumbs')
            <a href="{{ route('riwayatSetoran') }}" class="fs-6 tombol-kecil">Riwayat Setor Sampah</a>
    @endsection

    @section('button')
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
            + Jenis Sampah
        </button>
        <a href="{{ route('setorSampah') }}" class="btn btn-warning">
            Setor Sampah
        </a>
    @endsection
    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Tambah Jenis Sampah</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form wire:submit.prevent="store" enctype="multipart/form-data">
                    <div class="modal-body">
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control @error('jenis_sampah') is-invalid @enderror"
                                id="jenis_sampah" wire:model="jenis_sampah">
                            <label for="jenis_sampah" class="form-label">Jenis Sampah</label>
                            @error('jenis_sampah')
                                <small class="text-danger">
                                    {{ $message }}
                                </small>
                            @enderror
                        </div>
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control @error('harga_per_kg') is-invalid @enderror"
                                id="harga_per_kg" wire:model="harga_per_kg">
                            <label for="harga_per_kg" class="form-label">Harga/kg</label>
                            @error('harga_per_kg')
                                <small class="text-danger">
                                    {{ $message }}
                                </small>
                            @enderror
                        </div>
                        <div class="form-floating">
                            <textarea class="form-control" placeholder="Leave a comment here" id="desc" style="height: 100px"
                                wire:model="desc"></textarea>
                            <label for="desc" class="form-label">Deskripsi</label>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    @if (session()->has('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <div class="card">
        <div class="card-header">
            <h4 class="card-title">
                Daftar Jenis Sampah
            </h4>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table">
                    <thead>
                        <th>No</th>
                        <th>Jenis Sampah</th>
                        <th>Harga/kg</th>
                        <th>Deskripsi</th>
                        <th>Aksi</th>
                    </thead>
                    <tbody>
                        @forelse ($jenis_sampahs as $sampah)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $sampah->jenis_sampah }}</td>
                                <td>@currency($sampah->harga_per_kg)</td>
                                <td>{{ $sampah->desc }}</td>
                                <td>
                                    <!-- Button trigger modal -->
                                    <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                        data-bs-target="#editSampahModal">
                                        Edit
                                    </button>

                                    <!-- Modal -->
                                    <div class="modal fade" id="editSampahModal" tabindex="-1"
                                        aria-labelledby="editSampahModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h1 class="modal-title fs-5" id="editSampahModalLabel">Edit Jenis
                                                        Sampah
                                                    </h1>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                        aria-label="Close"></button>
                                                </div>
                                                <form wire:submit.prevent="update" enctype="multipart/form-data">
                                                    <div class="modal-body">
                                                        <div class="form-floating mb-3">
                                                            <input type="text" class="form-control @error('jenis_sampah') is-invalid @enderror"
                                                                id="jenis_sampah" wire:model="jenis_sampah" placeholder="{{ $sampah->jenis_sampah }}">
                                                            <label for="jenis_sampah" class="form-label">Jenis Sampah</label>
                                                            @error('jenis_sampah')
                                                                <small class="text-danger">
                                                                    {{ $message }}
                                                                </small>
                                                            @enderror
                                                        </div>
                                                        <div class="form-floating mb-3">
                                                            <input type="text" class="form-control @error('harga_per_kg') is-invalid @enderror"
                                                                id="harga_per_kg" wire:model="harga_per_kg" placeholder="@currency($sampah->harga_per_kg)">
                                                            <label for="harga_per_kg" class="form-label">Harga/kg</label>
                                                            @error('harga_per_kg')
                                                                <small class="text-danger">
                                                                    {{ $message }}
                                                                </small>
                                                            @enderror
                                                        </div>
                                                        <div class="form-floating">
                                                            <textarea class="form-control" placeholder="Leave a comment here" id="desc" style="height: 100px"
                                                                wire:model="desc"></textarea>
                                                            <label for="desc" class="form-label">Deskripsi</label>
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                                                        <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </td>

                            @empty
                                <td colspan="5">Kosong</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
