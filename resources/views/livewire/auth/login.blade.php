<div class="container-fluid">


    <div class="row justify-content-center align-items-center vh-100">
        {{-- @if ($errorMessage)
            <div class="alert alert-danger">{{ $errorMessage }}</div>
        @endif --}}
        <div class="card" style="width: 480px">
            <div class="card-body">
                <div class="mb-5">
                    <h3 class="fw-bold text-primary">Login</h3>
                    <small>Untuk mengakses Layanan, silakan login terlebih dahulu!</small>
                </div>

                {{-- Form --}}
                <form wire:submit.prevent="login">

                    <div class="mb-3">
                        <label for="nik" class="form-label">nik</label>
                        <input type="text" class="form-control @error('nik') is-invalid @enderror" id="nik"
                            name="nik" placeholder="Masukan nik" autofocus wire:model="nik">
                        @error('nik')
                            <div class="alert alert-danger mt-2">
                                {{ $message }}
                            </div>
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
                        <button class="btn btn-primary d-grid w-100 fw-bold" type="submit">Masuk</button>
                        <a href="/" class="btn btn-outline-secondary w-100 mt-1">Kembali</a>
                    </div>
                </form>
                {{-- End Form --}}


                <div class="mt-3s">
                    <small>Tidak punya akun? <a href="">Daftar sekarang.</a></small>
                </div>
            </div>
        </div>
    </div>

</div>
