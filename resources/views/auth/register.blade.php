@extends('components.app-layout')

@section('content')
<div class="container-fluid bg-login">
    <div class="row justify-content-center align-items-center vh-100 bg-login">
        <div class="card" style="width: 480px">
            <div class="card-body">
                <div class="mb-5">
                    <h3 class="fw-bold text-primary">Daftar</h3>
                    <small>Silakan daftar untuk mengakses semua fitur pada website ini.</small>
                </div>
                <form action="{{ route('doRegister') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <label for="nik" class="form-label">NIK</label>
                        <input type="text" class="form-control" id="nik" name="nik"
                            placeholder="Masukan NIK" autofocus>
                            {{-- @error('nik')
                                <small class="text-danger">
                                  {{ $message }}
                                </small>
                            @enderror --}}
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control" id="email" name="email"
                            placeholder="Masukan Email" autofocus>
                    </div>
                    <div class="mb-3">
                        <label for="phone" class="form-label">Nomor Telepon</label>
                        <input type="text" class="form-control" id="phone" name="phone"
                            placeholder="Masukan Nomor Telepon" autofocus>
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
                                placeholder="Masukan Password"
                                aria-describedby="password" />
                            {{-- <span class="input-group-text cursor-pointer"><i class="bx bx-hide"></i></span> --}}
                        </div>
                    </div>
                    <div class="mb-3">
                        <button class="btn btn-primary d-grid w-100 fw-bold" type="submit">Daftar</button>
                        <a href="/" class="btn btn-outline-secondary w-100 mt-1">Kembali</a>

                    </div>
                </form>
                <div class="mt-3s">
                    <small>Sudah punya akun? <a href="{{ route('view-login') }}">Masuk sekarang.</a></small>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
