@extends('components.app-layout')

@section('content')
<div class="container-fluid bg-login">
    <div class="row justify-content-center align-items-center vh-100 bg-login">
        <div class="card" style="width: 480px">
            <div class="card-body">
                <div class="mb-5">
                    <h3 class="fw-bold text-primary">Login</h3>
                    <small>Untuk mengakses Layanan, silakan login terlebih dahulu!</small>
                </div>
                <form action="{{ route('doLogin') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <label for="nik" class="form-label">NIK</label>
                        <input type="text" class="form-control" id="nik" name="nik"
                            placeholder="Masukan NIK" autofocus>
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
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="remember-me">
                            <label class="form-check-label" for="remember-me">
                                Remember Me
                            </label>
                        </div>
                    </div>
                    <div class="mb-3">
                        <button class="btn btn-primary d-grid w-100 fw-bold" type="submit">Masuk</button>
                        <a href="/" class="btn btn-outline-secondary w-100 mt-1">Kembali</a>
                    </div>
                </form>
                <div class="mt-3s">
                    <small>Tidak punya akun? <a href="{{ route('registerPage') }}"">Daftar sekarang.</a></small>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
