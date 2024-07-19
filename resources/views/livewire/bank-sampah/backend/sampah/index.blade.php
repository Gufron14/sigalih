<div class="mt-4">

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
                        <button type="submit" class="btn btn-primary fw-bold">
                            <i class="fas fa-save me-2"></i>Simpan</button>
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
        <div class="card-header d-flex justify-content-between align-items-center">
            <h5 class="card-title">
                Daftar Jenis Sampah
            </h5>
            <button type="button" class="btn btn-primary btn-sm fw-bold" data-bs-toggle="modal"
                data-bs-target="#exampleModal">
                <i class="fas fa-plus-circle me-2"></i> Jenis Sampah
            </button>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-sm">
                    <thead>
                        <th class="text-center">No</th>
                        <th>Jenis Sampah</th>
                        <th>Harga/kg</th>
                        <th>Deskripsi</th>
                        <th class="text-center">Aksi</th>
                    </thead>
                    <tbody>
                        @forelse ($jenis_sampahs as $sampah)
                            <tr>
                                <td class="text-center">{{ $loop->iteration }}</td>
                                <td>{{ $sampah->jenis_sampah }}</td>
                                <td>@currency($sampah->harga_per_kg)</td>
                                <td>{{ $sampah->desc }}</td>
                                <td class="text-center">
                                    <!-- Button trigger modal -->
                                    <a href="{{ route('editSampah', $sampah->id) }}" type="button" class="btn btn-secondary-faded btn-sm">
                                        <i class="fas fa-edit text-primary"></i>
                                    </a>
                                    
                                    <button type="submit" class="btn btn-secondary-faded btn-sm"
                                        wire:click="destroy({{ $sampah->id }})"
                                        wire:confirm="Anda yakin ingin menghapus jenis sampah {{ $sampah->jenis_sampah }}?">
                                        <i class="bi bi-trash-fill text-danger fs-6"></i>
                                    </button>

                                    <!-- Modal -->
                                    <div class="modal fade" id="editSampahModal{{ $sampah->id }}" tabindex="-1"
                                        aria-labelledby="editSampahModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h1 class="modal-title fs-5" id="editSampahModalLabel">Edit
                                                        {{ $sampah->jenis_sampah }}</h1>
                                                    </h1>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                        aria-label="Close"></button>
                                                </div>
                                                
                                                <form wire:submit.prevent="update" enctype="multipart/form-data">
                                                    <div class="modal-body">
                                                        <div class="mb-3">
                                                            <label for="jenis_sampah" class="form-label">Jenis Sampah</label>
                                                            <input type="text" class="form-control @error('jenis_sampah') is-invalid @enderror"
                                                                wire:model="jenis_sampah" placeholder="{{ $sampah->jenis_sampah }}">
                                                            @error('jenis_sampah')
                                                                <small class="text-danger">
                                                                    {{ $message }}
                                                                </small>
                                                            @enderror
                                                        </div>
                                                        <div class="mb-3">
                                                            <label for="harga_per_kg" class="form-label">Harga/kg</label>
                                                            <input type="text" class="form-control @error('harga_per_kg') is-invalid @enderror"
                                                                wire:model="harga_per_kg" placeholder="@currency($sampah->harga_per_kg)">
                                                            @error('harga_per_kg')
                                                                <small class="text-danger">
                                                                    {{ $message }}
                                                                </small>
                                                            @enderror
                                                        </div>
                                                        <div class="">
                                                            <label for="desc" class="form-label">Deskripsi</label>
                                                            <textarea class="form-control" style="height: 100px" wire:model="desc"
                                                            placeholder="{{  $sampah->desc }}"></textarea>
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary"
                                                            data-bs-dismiss="modal">Batal</button>
                                                        <button type="submit" class="btn btn-primary fw-bold">
                                                            <i class="fas fa-save me-2"></i>Simpan
                                                            Perubahan</button>
                                                    </div>  
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </td>

                            @empty
                                <td colspan="5" class="text-center text-muted p-5">Belum ada Jenis Sampah</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
