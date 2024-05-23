<div class="container-fluid">

    @if (session()->has('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

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
                    <h3 class="fw-bold text-primary">Login</h3>
                </div>

                {{-- Form --}}
                <form wire:submit.prevent="login" enctype="multipart/form-data">

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


                    <div class="mb-3 form-password-toggle">

                        <div class="d-flex justify-content-between">
                            <label class="form-label" for="password">Password</label>
                            <a href="auth-forgot-password-basic.html">
                                <small>Lupa Password?</small>
                            </a>
                        </div>

                        <div class="input-group input-group-merge">
                            <input type="password" id="password" class="form-control" name="password"
                                wire:model="password" placeholder="Masukan Password" aria-describedby="password" />
                            {{-- <span class="input-group-text cursor-pointer"><i class="bx bx-hide"></i></span> --}}
                        </div>
                        @error('password')
                            <small class="text-danger">
                                {{ $message }}
                            </small>
                        @enderror


                    </div>
                    {{-- <div class="mb-3">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="remember-me">
                                <label class="form-check-label" for="remember-me">
                                    Remember Me
                                </label>
                            </div>
                        </div> --}}
                    <div class="mb-3">

                        <button type="submit" class="btn btn-primary d-grid w-100 fw-bold">Masuk</button>
                        <a href="/" class="btn btn-outline-secondary w-100 mt-1">Kembali</a>
                    </div>

                </form>
                {{-- End Form --}}


                <div class="mt-3 text-center">
                    <small>Tidak punya akun? <a href="{{ route('register') }}" class="fw-bold">Daftar sekarang.</a></small>
                </div>
            </div>
        </div>
    </div>

</div>
