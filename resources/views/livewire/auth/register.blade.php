<div class="container-fluid p-5">

    <div class="row justify-content-center align-items-center vh-100">
        {{-- @if ($errorMessage)
            <div class="alert alert-danger">{{ $errorMessage }}</div>
        @endif --}}
        <div class="card shadow" style="width: 480px">
            <div class="card-body p-5">

                <div class="mb-5">
                    <a class="navbar-brand mt-2 mt-lg-0 d-flex align-items-center" href="#">
                        <img src="{{ asset('assets/img/1.png') }}" height="40" alt="MDB Logo" loading="lazy" />
                        <span class="ms-3 d-flex flex-column">
                            <span class="fw-bold">Desa</span>
                            <span class="fw-bold">Sirnagalih</span>
                        </span>
                    </a>
                </div>

                <div class="mb-3 text-center">
                    <h3 class="fw-bold text-primary">Daftar Akun</h3>
                </div>

                {{-- Form --}}
                <form wire:submit.prevent="register" enctype="multipart/form-data">

                    <div class="mb-3">
                        <label for="nik" class="form-label">NIK</label>
                        <input type="text" class="form-control @error('nik') is-invalid @enderror" id="nik"
                            name="nik" placeholder="Masukan NIK" autofocus wire:model="nik">
                        @error('nik')
                            <small class="text-danger">
                                {{ $message }}
                            </small>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control @error('email') is-invalid @enderror" id="email"
                            name="email" placeholder="Masukan Email" autofocus wire:model="email">
                        @error('email')
                            <small class="text-danger">
                                {{ $message }}
                            </small>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="phone" class="form-label">Nomor Telepon</label>
                        <input type="text" class="form-control @error('phone') is-invalid @enderror" id="phone"
                            name="phone" placeholder="Masukan Nomor Telepon" autofocus wire:model="phone">
                        @error('phone')
                            <small class="text-danger">
                                {{ $message }}
                            </small>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">Password</label>
                            <input type="password" id="password" class="form-control" name="password"
                                wire:model="password" placeholder="Masukan Password" aria-describedby="password" />
                            {{-- <span class="input-group-text cursor-pointer"><i class="bx bx-hide"></i></span> --}}

                        @error('password')
                            <small class="text-danger">
                                {{ $message }}
                            </small>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <button type="submit" class="btn btn-primary d-grid w-100 fw-bold">Daftar</button>
                        <a href="/" class="btn btn-outline-secondary w-100 mt-1">Kembali</a>
                    </div>
                </form>
                {{-- End Form --}}

                <div class="mt-3 text-center">
                    <p>Sudah punya akun? <a href="{{ route('login') }}" class="fw-bold">Login</a></p>
                </div>
            </div>
        </div>
    </div>

</div>
