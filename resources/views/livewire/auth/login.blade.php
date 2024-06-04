<div>
    @if (session()->has('success'))
        <div class="alert alert-success w-50 mx-auto">
            {{ session('success') }}
        </div>
    @endif
    <div class="container-fluid p-5 d-flex align-items-center justify-content-center vh-100">

        <div class="row justify-content-center align-items-center">
            {{-- @if ($errorMessage)
            <div class="alert alert-danger">{{ $errorMessage }}</div>
        @endif --}}
            <div class="card shadow p-3" style="width: 360px; height: 480px;">
                <div class="card-body">

                    <div class="mb-3">
                        <a class="navbar-brand mt-2 mt-lg-0 d-flex align-items-center" href="#">
                            <img src="{{ asset('assets/img/1.png') }}" height="38" alt="MDB Logo" loading="lazy" />
                            <span class="ms-3 d-flex flex-column fw-bold">
                                DESA SIRNAGALIH
                            </span>
                        </a>
                    </div>

                    <div class="mb-5 text-center">
                        <h4 class="fw-bold text-primary">Login</h4>
                    </div>

                    {{-- Form --}}
                    <form wire:submit.prevent="login" enctype="multipart/form-data">

                        <div class="mb-3">
                            <input type="text" class="form-control @error('nik') is-invalid @enderror" id="nik"
                                name="nik" placeholder="Masukan NIK" autofocus wire:model="nik">
                            @error('nik')
                                <small class="text-danger">
                                    {{ $message }}
                                </small>
                            @enderror
                        </div>


                        <div class="mb-3 form-password-toggle">
                            <div class="input-group input-group-merge">
                                <input type="password" id="password"
                                    class="form-control @error('password') is-invalid @enderror" name="password"
                                    wire:model="password" placeholder="Masukan Password" aria-describedby="password" />
                                {{-- <span class="input-group-text cursor-pointer"><i class="bx bx-hide"></i></span> --}}
                            </div>
                            @error('password')
                                <small class="text-danger">
                                    {{ $message }}
                                </small>
                            @enderror


                        </div>
                        <div class="mb-5">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="remember-me">
                                <label class="form-check-label" for="remember-me">
                                    <small>Ingat saya</small>
                                </label>
                            </div>
                        </div>
                        @if (session()->has('error'))
                            <small class="text-danger mx-auto">
                                {{ session('error') }}
                            </small>
                        @endif
                        <div class="mb-3 mt-3">
                            <button type="submit" class="btn btn-primary d-grid w-100 fw-bold">Masuk</button>
                            <a href="/" class="btn btn-outline-secondary w-100 mt-1">Kembali</a>
                        </div>

                    </form>
                    {{-- End Form --}}


                    <div class="mt-3 text-center">
                        <small>Tidak punya akun? <a href="{{ route('register') }}" class="fw-bold">Daftar
                                sekarang.</a></small>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>
