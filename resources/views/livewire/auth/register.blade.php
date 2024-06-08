<div>
    <div class="container-fluid p-5 d-flex align-items-center justify-content-center vh-100"
    style="background-image: linear-gradient(120deg, #fdfbfb 0%, #ebedee 100%);">
        <div class="card shadow" style="width: 75%">
            <div class="row">
                <div class="col-md-6">
                    <img src="https://i.pinimg.com/564x/6d/70/a2/6d70a2988d68c1e798b1fe649b7df3c2.jpg" alt=""
                    class="img-fluid rounded-start" style="">
                </div>
                <div class="col-md-5 ms-4 d-flex align-items-center justify-content-center">
                    <div class="card-body">
                        <div class="mb-3 text-center">
                            <img src="{{ asset('assets/img/1.png') }}" alt="" width="40px">
                        </div>
        
                        <div class="mb-5 text-center">
                            <h4 class="fw-bold text-danger">Daftar Akun Sirnagalih</h4>
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
                            <div class="mb-3 mt-3">
                                <button type="submit" class="btn btn-primary d-grid w-100 fw-bold">Daftar</button>
                            </div>
                        </form>
                        {{-- End Form --}}
        
                        <div class="mt-3 text-center">
                            <p>Sudah memiliki akun? <a href="{{ route('login') }}" class="fw-bold">Login</a> <br></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>  
</div>
