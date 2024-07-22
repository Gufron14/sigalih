<div>
    <div class="container-fluid p-5 d-flex align-items-center justify-content-center vh-100"
        style="background-image: linear-gradient(120deg, #fdfbfb 0%, #ebedee 100%);">

        <div class="card shadow-sm" style="max-width: 75%;">
            <div class="row">
                <div class="col-md-6">
                    <img src="{{ asset('assets/img/Sirnagalih.jpg') }}" alt=""
                        class="img-fluid rounded-start" style="">
                </div>
                <div class="col-md-5 ms-4 d-flex align-items-center justify-content-center">
                    <div class="card-body">
                        <div class="mb-3 text-center">
                            <img src="{{ asset('assets/img/1.png') }}" alt="" width="40px">
                        </div>

                        <div class="mb-5 text-center">
                            <h4 class="fw-bold text-danger">Login Sirnagalih</h4>
                        </div>

                        {{-- Form --}}
                        <form wire:submit.prevent="login" enctype="multipart/form-data">
                            {{-- NIK --}}
                            <div class="mb-3">
                                <input type="text" class="form-control @error('nik') is-invalid @enderror"
                                    id="nik" name="nik" placeholder="Masukan NIK" autofocus wire:model="nik">
                                @error('nik')
                                    <small class="text-danger">
                                        {{ $message }}
                                    </small>
                                @enderror
                            </div>
                            {{-- Password --}}
                            <div class="mb-3 form-password-toggle">
                                <div class="input-group input-group-merge">
                                    <input type="password" id="password"
                                        class="form-control @error('password') is-invalid @enderror" name="password"
                                        wire:model="password" placeholder="Masukan Password"
                                        aria-describedby="password" />
                                    {{-- <span class="input-group-text cursor-pointer"><i class="bx bx-hide"></i></span> --}}
                                </div>
                                @error('password')
                                    <small class="text-danger">
                                        {{ $message }}
                                    </small>
                                @enderror


                            </div>
                            <div class="mb-3">
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
                            <small>Belum memiliki akun? <a href="{{ route('register') }}" class="fw-bold">Daftar
                                    sekarang.</a></small>
                        </div>
                    </div>
                </div>
            </div>
        </div>


    </div>
</div>
