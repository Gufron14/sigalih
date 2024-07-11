<div class="container mx-auto">

    <div class="row align-items-center">
        <div class="col mt-5 mb-3">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('layanan') }}">Layanan</a></li>
                    <li class="breadcrumb-item active fw-bold" aria-current="page">{{ $surat->nama_surat }}</li>
                </ol>
            </nav>
        </div>
        <div class="col">
            @if (session()->has('success'))
                <div class="alert alert-success mt-5">{{ session('success') }}</div>
            @elseif (session()->has('error'))
                <div class="alert alert-danger mt-5">
                    <i class="fas fa-times me-1"></i>{{ session('error') }}
                </div>
            @endif
        </div>
    </div>



    <div class="row ">
        <div class="col">
            <p>{{ $surat->desc }}</p>
        </div>
        <div class="col-md-6">
            @if ($statusPermohonan)
                @if ($statusPermohonan === 'tunggu')
                    <div class="card border-warning rounded-4 shadow-sm mb-4">
                        <div class="card-body p-4 d-flex gap-4 align-items-center">
                            <i class="fas fa-history text-warning h1"></i>
                            <div>
                                <h5 class="card-title">Permohonan Sedang Diproses</h5>
                                <p class="card-text">Permohonan {{ $jenisSurat->nama_surat }} Anda sedang dalam proses.
                                    Mohon tunggu informasi lebih lanjut.</p>
                            </div>
                        </div>
                    </div>
                @elseif ($statusPermohonan === 'terima')
                    <div class="card border-success rounded-4 shadow-sm  mb-4">
                        <div class="card-body d-flex p-4 gap-4 align-items-center">
                            <i class="fas fa-check-circle text-success h1"></i>
                            <div class="lh-sm">
                                <h5 class="card-title">Permohonan Diterima</h5>
                                <small class="card-text">Permohonan {{ $jenisSurat->nama_surat }} Anda telah
                                    diterima.</small>
                                <div class="mb-3">
                                    @if ($request_surat->catatan_admin)
                                        <small class="text-secondary">{{ $request_surat->catatan_admin }}</small>
                                    @endif
                                </div>
                                <a href="{{ Storage::url($request_surat->file_surat) }}" target="_blank" download=""
                                    class="btn btn-sm btn-primary fw-bold rounded-3"><i
                                        class="bi bi-download me-2"></i>Download Surat</a>
                            </div>
                        </div>
                    </div>
                @elseif ($statusPermohonan === 'tolak')
                    <div class="card border-danger rounded-4 shadow-sm mb-4">
                        <div class="card-body p-4 d-flex gap-4 align-items-center">
                            <i class="fas fa-times-circle text-danger h1"></i>
                            <div class="lh-1">
                                <h5 class="card-title">Permohonan Ditolak</h5>
                                <p class="card-text">Permohonan {{ $jenisSurat->nama_surat }} Anda telah ditolak.
                                    Alasan: {{ $request_surat->catatan_admin }}</p>
                            </div>
                        </div>
                    </div>
                    {{-- formulir pengajuan --}}
                <div class="card">
                    <div class="card-header">
                        <div class="card-title fw-bold h5">Formulir {{ $surat->nama_surat }}</div>
                    </div>
                    <div class="card-body">
                        <form wire:submit.prevent="submit">
                            @if (!empty($formFields))
                                @foreach ($formFields as $field)
                                    <div class="mb-4">
                                        {{-- Text --}}
                                        @if ($field->field_type === 'text')
                                            <label for="{{ $field->field_label }}"
                                                class="form-label text-capitalize">{{ $field->field_label }}</label>
                                            <input type="text" wire:model="formData.{{ $field->field_label }}"
                                                class="form-control @error('formData.{{ $field->field_label }}') is-invalid @enderror"
                                                autofocus>
                                            @error('formData.{{ $field->field_label }}')
                                                <small class="text-danger">{{ $message }}</small>
                                            @enderror
                                            {{-- TextArea --}}
                                        @elseif($field->field_type === 'textarea')
                                            <label for="{{ $field->field_label }}"
                                                class="form-label text-capitalize">{{ $field->field_label }}</label>
                                            <textarea wire:model="formData.{{ $field->field_label }}"
                                                class="form-control @error('formData.{{ $field->field_label }}') is-invalid @enderror"></textarea>
                                            @error('formData.{{ $field->field_label }}')
                                                <small class="text-danger">{{ $message }}</small>
                                            @enderror
                                        @elseif ($field->field_type === 'number')
                                            <label for="{{ $field->field_label }}"
                                                class="form-label text-capitalize">{{ $field->field_label }}</label>
                                            <input type="number" wire:model="formData.{{ $field->field_label }}"
                                                class="form-control number @error('formData.{{ $field->field_label }}') is-invalid @enderror"
                                                id="numberInput">
                                            @error('formData.{{ $field->field_label }}')
                                                <small class="text-danger">{{ $message }}</small>
                                            @enderror
                                            {{-- File --}}
                                        @elseif($field->field_type === 'file')
                                            <label for="{{ $field->field_label }}"
                                                class="form-label text-capitalize">{{ $field->field_label }}</label>
                                            <input type="file" wire:model="formData.{{ $field->field_label }}"
                                                class="form-control @error('formData.{{ $field->field_label }}') is-invalid @enderror"
                                                id="{{ $field->field_label }}"
                                                accept="image/*,application/pdf,application/msword,application/vnd.openxmlformats-officedocument.wordprocessingml.document">
                                            @error('formData.{{ $field->field_label }}')
                                                <small class="text-danger">{{ $message }}</small>
                                            @enderror
                                            {{-- Date --}}
                                        @elseif($field->field_type === 'date')
                                            <label for="{{ $field->field_label }}"
                                                class="form-label text-capitalize">{{ $field->field_label }}</label>
                                            <input type="date" wire:model="formData.{{ $field->field_label }}"
                                                class="form-control @error('formData.{{ $field->field_label }}') is-invalid @enderror">
                                            @error('formData.{{ $field->field_label }}')
                                                <small class="text-danger">{{ $message }}</small>
                                            @enderror
                                            {{-- Time --}}
                                        @elseif($field->field_type === 'time')
                                            <label for="{{ $field->field_label }}"
                                                class="form-label text-capitalize">{{ $field->field_label }}</label>
                                            <input type="time" wire:model="formData.{{ $field->field_label }}"
                                                class="form-control @error('formData.{{ $field->field_label }}') is-invalid @enderror">
                                            @error('formData.{{ $field->field_label }}')
                                                <small class="text-danger">{{ $message }}</small>
                                            @enderror
                                        @endif
                                        @error($field->field_label)
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                @endforeach
                            @else
                                <div class="alert alert-danger">Formulir Surat Kosong. Coba lagi nanti.</div>
                            @endif

                            <button type="submit" class="btn btn-primary fw-bold w-100">Kirim Permohonan</button>
                        </form>
                        {{-- @if ($request->status === 'tolak')
                            test
                        @endif --}}
                    </div>
                </div>
                @endif
            @else

                {{-- formulir pengajuan --}}
                <div class="card">
                    <div class="card-header">
                        <div class="card-title fw-bold h5">Formulir {{ $surat->nama_surat }}</div>
                    </div>
                    <div class="card-body">
                        <form wire:submit.prevent="submit">
                            @if (!empty($formFields))
                                @foreach ($formFields as $field)
                                    <div class="mb-4">
                                        {{-- Text --}}
                                        @if ($field->field_type === 'text')
                                            <label for="{{ $field->field_label }}"
                                                class="form-label text-capitalize">{{ $field->field_label }}</label>
                                            <input type="text" wire:model="formData.{{ $field->field_label }}"
                                                class="form-control @error('formData.{{ $field->field_label }}') is-invalid @enderror"
                                                autofocus>
                                            @error('formData.{{ $field->field_label }}')
                                                <small class="text-danger">{{ $message }}</small>
                                            @enderror
                                            {{-- TextArea --}}
                                        @elseif($field->field_type === 'textarea')
                                            <label for="{{ $field->field_label }}"
                                                class="form-label text-capitalize">{{ $field->field_label }}</label>
                                            <textarea wire:model="formData.{{ $field->field_label }}"
                                                class="form-control @error('formData.{{ $field->field_label }}') is-invalid @enderror"></textarea>
                                            @error('formData.{{ $field->field_label }}')
                                                <small class="text-danger">{{ $message }}</small>
                                            @enderror
                                        @elseif ($field->field_type === 'number')
                                            <label for="{{ $field->field_label }}"
                                                class="form-label text-capitalize">{{ $field->field_label }}</label>
                                            <input type="number" wire:model="formData.{{ $field->field_label }}"
                                                class="form-control number @error('formData.{{ $field->field_label }}') is-invalid @enderror"
                                                id="numberInput">
                                            @error('formData.{{ $field->field_label }}')
                                                <small class="text-danger">{{ $message }}</small>
                                            @enderror
                                            {{-- File --}}
                                        @elseif($field->field_type === 'file')
                                            <label for="{{ $field->field_label }}"
                                                class="form-label text-capitalize">{{ $field->field_label }}</label>
                                            <input type="file" wire:model="formData.{{ $field->field_label }}"
                                                class="form-control @error('formData.{{ $field->field_label }}') is-invalid @enderror"
                                                id="{{ $field->field_label }}"
                                                accept="image/*,application/pdf,application/msword,application/vnd.openxmlformats-officedocument.wordprocessingml.document">
                                            @error('formData.{{ $field->field_label }}')
                                                <small class="text-danger">{{ $message }}</small>
                                            @enderror
                                            {{-- Date --}}
                                        @elseif($field->field_type === 'date')
                                            <label for="{{ $field->field_label }}"
                                                class="form-label text-capitalize">{{ $field->field_label }}</label>
                                            <input type="date" wire:model="formData.{{ $field->field_label }}"
                                                class="form-control @error('formData.{{ $field->field_label }}') is-invalid @enderror">
                                            @error('formData.{{ $field->field_label }}')
                                                <small class="text-danger">{{ $message }}</small>
                                            @enderror
                                            {{-- Time --}}
                                        @elseif($field->field_type === 'time')
                                            <label for="{{ $field->field_label }}"
                                                class="form-label text-capitalize">{{ $field->field_label }}</label>
                                            <input type="time" wire:model="formData.{{ $field->field_label }}"
                                                class="form-control @error('formData.{{ $field->field_label }}') is-invalid @enderror">
                                            @error('formData.{{ $field->field_label }}')
                                                <small class="text-danger">{{ $message }}</small>
                                            @enderror
                                        @endif
                                        @error($field->field_label)
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                @endforeach
                            @else
                                <div class="alert alert-danger">Formulir Surat Kosong. Coba lagi nanti.</div>
                            @endif

                            <button type="submit" class="btn btn-primary fw-bold w-100">Kirim Permohonan</button>
                        </form>
                        {{-- @if ($request->status === 'tolak')
                            test
                        @endif --}}
                    </div>
                </div>
            @endif
        </div>

    </div>



</div>
