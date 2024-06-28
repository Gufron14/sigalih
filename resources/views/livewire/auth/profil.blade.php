<div class="container p-5">
    
    <div class="container">
        <h3 class="fw-bold mb-4 text-center">Edit Profil</h3>
        <div class="card w-75 mx-auto p-4">
            <div class="card-body">
                <form action="" wire:submit.prevent="editProfil">
                    <div class="row">
                        <div class="col d-flex gap-3 align-items-center mb-4">
                            @if (auth()->user()->avatar)
                                <div class="avatar" style="width: 120px; height: 120px;">
                                    <img src="{{ Storage::url(Auth::user()->avatar) }}" class="object-fit-cover rounded-circle"
                                        alt="..." width="120px" height="120px">
                                </div>
                            @else
                                <img src="https://ui-avatars.com/api/?name={{ auth()->user()->warga->nama }}"
                                    class="img-thumbnail rounded-circle" alt="">
                            @endif
                            <div class="">
                                <h5 class="fw-bold">{{ auth()->user()->warga->nama }}</h5>
                            </div>
                        </div>
                        <div class="col">
                            <label for="" class="form-label">Ubah Foto Profil</label>
                            <input type="file" class="form-control" wire:model="avatar">
                            @error('avatar')
                                <small>{{ $message }}</small>
                            @enderror
                        </div>
                    </div>
                    
                    <div class="d-flex align-items-center mb-3">
                        <div class="col">
                            <label for="">Email</label>
                        </div>
                        <div class="col">
                            <input type="text" class="form-control" wire:model="email"
                                value="{{ auth()->user()->email }}">
                            @error('email')
                                <small class="text-danger">
                                    {{ $message }}
                                </small>
                            @enderror
                        </div>
                    </div>
                    <div class="d-flex align-items-center mb-3">
                        <div class="col">
                            <label for="">No. Telepon</label>
                        </div>
                        <div class="col">
                            <input type="text" class="form-control" wire:model="phone"
                                value="{{ auth()->user()->phone }}">
                            @error('phone')
                                <small class="text-danger">
                                    {{ $message }}
                                </small>
                            @enderror
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary fw-bold float-end">Simpan Perubahan</button>
                </form>

            </div>
        </div>

    </div>
</div>
