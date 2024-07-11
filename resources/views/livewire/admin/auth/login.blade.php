<div>
    <div class="d-flex align-items-center vh-100"
        style="background-image: linear-gradient(120deg, #fdfbfb 0%, #ebedee 100%);">
        <div class="card mx-auto w-75 shadow-sm border-0">
            <div class="card-body">
                <div class="row align-items-center">
                    <div class="col p-5">
                        <img src="{{ asset('assets/img/receptionist-working-on-her-desk-with-laptop.svg') }}" alt="">
                    </div>
                    <div class="col p-5">
                        <div class="mb-5 text-center">
                            <h4 class="fw-bold text-danger">Login Admin Sigalih</h4>
                        </div>
                        {{-- Form --}}
                        <form wire:submit.prevent="login" enctype="multipart/form-data">
                            <div class="mb-3">
                                <input type="text" class="form-control @error('username') is-invalid @enderror"
                                    name="username" placeholder="Masukan Username" autofocus wire:model="username">
                                @error('username')
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
                                    @error('password')
                                        <small class="text-danger">
                                            {{ $message }}
                                        </small>
                                    @enderror
                                </div>
                            </div>
                            <div class="mb-3">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" wire:model="remember">
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
                            </div>
                        </form>
                        {{-- End Form --}}
                    </div>

                </div>
            </div>
        </div>
    </div>
