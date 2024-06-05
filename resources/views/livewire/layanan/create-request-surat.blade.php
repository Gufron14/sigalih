<div class="container">

    @if (session()->has('message'))
        <div class="alert alert-success mt-5">{{ session('message') }}</div>
    @endif

    @if (session()->has('error'))
        <div class="alert alert-danger mt-5">{{ session('error') }}</div>
    @endif

    {{-- ---------------------------- --}}

    <div class="row gap-5">
        <div class="col">
            <div class="mt-5 mb-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('layanan') }}">Layanan</a></li>
                        <li class="breadcrumb-item active fw-bold" aria-current="page">{{ $surat->nama_surat }}</li>
                    </ol>
                </nav>
            </div>
            <div class="d-flex align-items-center">
                <div>
                    <small class="mt-3 text-secondary">{{ $surat->desc }}</small>
                </div>
            </div>
        </div>
        <div class="col mt-5">
            <div class="card shadow-sm">
                <div class="card-body p-5">
                    <div class="mb-3">
                        <h5 class="fw-bold">Formulir {{ $surat->nama_surat }}</h5>
                        <hr>
                    </div>
                    <form wire:submit.prevent="submit">
                        @if (!empty($formFields))
                            @foreach ($formFields as $field)
                                <div class="mb-4">
                                    @if ($field->field_type === 'text')
                                        <label for="{{ $field->field_label }}"
                                            class="form-label">{{ $field->field_label }}</label>
                                        <input type="text" wire:model="formData.{{ $field->field_label }}"
                                            class="form-control" placeholder="{{ $field->field_label }}">
                                    @elseif($field->field_type === 'number')
                                        <label for="{{ $field->field_label }}"
                                            class="form-label">{{ $field->field_label }}</label>
                                        <input type="number" wire:model="formData.{{ $field->field_label }}"
                                            class="form-control" placeholder="{{ $field->field_label }}">
                                    @elseif($field->field_type === 'file')
                                        <label for="{{ $field->field_label }}"
                                            class="form-label">{{ $field->field_label }}</label>
                                        <input type="file" wire:model="formData.{{ $field->field_label }}"
                                            class="form-control" id="{{ $field->field_label }}"
                                            accept="image/*,application/pdf,application/msword,application/vnd.openxmlformats-officedocument.wordprocessingml.document">
                                    @endif
                                    @error($field->field_label)
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
