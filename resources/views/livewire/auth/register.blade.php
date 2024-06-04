<div class="container-fluid">

    <div class="row justify-content-center align-items-center vh-100">
        {{-- @if ($errorMessage)
            <div class="alert alert-danger">{{ $errorMessage }}</div>
        @endif --}}
        <div class="card shadow" style="width: 480px">
            <div class="card-body p-5">

                <div class="mb-5">
                    <a class="navbar-brand mt-2 mt-lg-0 d-flex align-items-center" href="#">
                        <img src="{{ asset('assets/img/1.png') }}" height="40" alt="MDB Logo" loading="lazy" />
                        <span class="ms-3 d-flex flex-column fw-bold">
                            DESA <br>
                            SIRNAGALIH
                        </span>
                    </a>
                </div>

                <div class="mb-5 text-center">
                    <h3 class="fw-bold text-primary">Daftar Akun</h3>
                </div>

                {{-- Form --}}
                <form wire:submit.prevent="register" enctype="multipart/form-data">

                    <div class="mb-3">
                        <input type="text" class="form-control @error('nik') is-invalid @enderror" id="nik"
                            name="nik" placeholder="Nomor Induk Kependudukan (NIK)" autofocus wire:model="nik">
                        @error('nik')
                            <small class="text-danger">
                                {{ $message }}
                            </small>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <input type="email" class="form-control @error('email') is-invalid @enderror" id="email"
                            name="email" placeholder="Email" autofocus wire:model="email">
                        @error('email')
                            <small class="text-danger">
                                {{ $message }}
                            </small>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <input type="text" class="form-control @error('phone') is-invalid @enderror" id="phone"
                            name="phone" placeholder="Nomor Telepon" autofocus wire:model="phone">
                        @error('phone')
                            <small class="text-danger">
                                {{ $message }}
                            </small>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <input type="password" id="password" class="form-control @error('password') is-invalid @enderror" name="password" wire:model="password"
                            placeholder="Password" aria-describedby="password" />
                        {{-- <span class="input-group-text cursor-pointer"><i class="bx bx-hide"></i></span> --}}

                        @error('password')
                            <small class="text-danger">
                                {{ $message }}
                            </small>
                        @enderror
                    </div>
                    @if (session()->has('error'))
                        <small class="text-danger mx-auto">
                            {{ session('error') }}
                        </small>
                    @endif
                    <div class="mb-5 mt-3">
                        <button type="submit" class="btn btn-primary d-grid w-100 fw-bold">Daftar</button>
                        <a href="/" class="btn btn-outline-secondary w-100 mt-1">Kembali</a>
                    </div>
                </form>
                {{-- End Form --}}

                <div class="mt-3 text-center">
                    <p>Sudah punya akun? <a href="{{ route('login') }}" class="fw-bold">Login</a> <br>
                        <span><a href="">Hubungi Administrator</a></span>
                    </p>
                    
                </div>
            </div>
        </div>
    </div>

</div>
