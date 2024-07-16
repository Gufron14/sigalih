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
            <div class="form-group mt-3">
                <label for="" class="form-label text-uppercase fw-bold text-muted">Identitas Lengkap</label>
                <div class="table-responsive">
                    <table class="table table-bordered align-middle">
                        <tr>
                            <td>NIK</td>
                            <td>{{ auth()->user()->warga->nik }}</td>
                        </tr>
                        <tr>
                            <td>Nama Lengkap</td>
                            <td class="text-uppercase">{{ auth()->user()->warga->nama }}</td>
                        </tr>
                        <tr>
                            <td>Alamat</td>
                            <td>Kp. {{ auth()->user()->warga->alamat }}, 
                                RT. {{ auth()->user()->warga->rt }},
                                RW. {{ auth()->user()->warga->rw}},
                                Ds. {{ auth()->user()->warga->desa }},
                                Kec. {{ auth()->user()->warga->kec }},
                                Kab. {{ auth()->user()->warga->kab }}</td>
                        </tr>
                        <tr>
                            <td>Jenis Kelamin</td>
                            <td>
                                @if (auth()->user()->warga->jk == 'L')
                                    Laki - laki
                                @elseif (auth()->user()->warga->jk == 'P')
                                    Perempuan
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <td>Status Perkawinan</td>
                            <td>{{ auth()->user()->warga->status }}</td>
                        </tr>
                    </table>
                    <p>Identitas salah? <a href="https://wa.me/6283116613308">Hubungi Admin.</a></p>
                </div>
            </div>
        </div>

    </div>
</div>
