<div class="container">

    @if (session()->has('message'))
        <div class="alert alert-success mt-5">{{ session('message') }}</div>
    @endif

    @if (session()->has('error'))
        <div class="alert alert-danger mt-5">{{ session('error') }}</div>
    @endif

    <div class="mt-5 mb-3">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('layanan') }}">Layanan</a></li>
                <li class="breadcrumb-item active fw-bold" aria-current="page">{{ $surat->nama_surat }}</li>
            </ol>
        </nav>
    </div>

    {{-- ---------------------------- --}}

    <div class="row gap-5">
        <div class="col d-flex align-items-center">
            <div>
                <h4>{{ $surat->nama_surat }}</h4>
                <p class="mt-3 text-secondary">{{ $surat->desc }}</p>
            </div>
        </div>
        <div class="col">
            <div class="card shadow">
                <div class="card-body p-5">
                    <div class="mb-3">

                        <h5>Formulir {{ $surat->nama_surat }}</h5>
                    </div>

                    <form wire:submit.prevent="submit">
                        @if (!empty($formData))
                            @foreach ($formData as $key => $value)
                                <div class="mb-4">
                                    @if ($rules[$key] === 'text')
                                        <label for="{{ $key }}" class="form-label">{{ $key }}</label>
                                        <input type="text" wire:model="formData.{{ $key }}"
                                            class="form-control" placeholder="{{ $key }}">
                                    @elseif($rules[$key] === 'file')
                                        <label for="{{ $key }}"
                                            class="form-label">{{ $key }}</label>
                                        <input type="file" wire:model="formData.{{ $key }}"
                                            class="form-control" id="{{ $key }}" accept="image/*">
                                    @endif
                                    @error($key)
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                            @endforeach
                        @else
                            <div class="alert alert-danger">Terjadi kesalahan saat memuat formulir.</div>
                        @endif

                        <button type="submit" class="btn btn-primary fw-bold w-100">Kirim Permohonan</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

</div>
