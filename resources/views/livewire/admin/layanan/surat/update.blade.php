<div>
    @foreach ($surat as $item)        
    <button class="btn btn-primary" wire:click="showModal({{ $item->id }})"> 
        <i class="fas fa-edit"></i>
    </button>
    @endforeach

    <!-- Modal -->
    <div class="modal fade" id="editModal{{ $item->id }}" tabindex="-1"
        aria-labelledby="editModalLabel{{ $item->id }}" aria-hidden="true" wire:ignore.self>
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editModalLabel{{ $item->id }}">Edit {{ $item->nama_surat }}</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <!-- Form Edit Surat -->
                    <form wire:submit="update" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <!-- Tampilkan informasi surat dalam input atau field yang sesuai -->
                        <div class="mb-3">
                            <label for="nama_surat" class="form-label">Nama Surat</label>
                            <input type="text" class="form-control" wire:model="nama_surat"
                                value="{{ $item->nama_surat }}">
                        </div>
                        <div class="mb-3">
                            <label for="desc" class="form-label">Deskripsi (Opsional)</label>
                            <input class="form-control" id="desc" name="desc" rows="3"
                                placeholder="desc surat opsional" value="{{ $item->desc }}"></input>
                            @error('desc')
                                <small class="text-danger">
                                    {{ $message }}
                                </small>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="template" class="form-label">Tambahkan File Template Surat
                                (.doc/.docx)</label>
                            <input class="form-control" type="file" name="template" id="template">
                            @error('template')
                                <small class="text-danger">
                                    {{ $message }}
                                </small>
                            @enderror
                        </div>
                        <!-- Tombol untuk menyimpan perubahan -->
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                            <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
window.addEventListener('modal-open', event => {
    $('#editModal').modal('show');
});

</script>
