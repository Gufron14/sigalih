<div>
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @elseif (session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif
    <div class="mb-3">
        <label for="" class="form-label">Pilih Surat</label>
        <select class="form-select" wire:model.live="selectedJenisSurat">
            <option selected>Pilih Jenis Surat</option>
            @foreach ($surats as $surat)
                <option value="{{ $surat->id }}">{{ $surat->nama_surat }}</option>
            @endforeach
        </select>
    </div>

    @if ($selectedJenisSurat)
        <div class="card">
            <div class="card-header">
                <h5 class="fw-bold">Formulir</h5>
            </div>
            <div class="card-body">
                <form wire:submit.prevent="submit">
                    <div class="mb-4">
                        <label for="warga" class="form-label">Pilih Warga</label>
                        <select wire:model="selectedWarga" class="form-select @error('selectedWarga') is-invalid @enderror">
                            <option value="">Pilih Warga</option>
                            @foreach ($wargas as $warga)
                                <option value="{{ $warga->id }}">{{ $warga->nama }}</option>
                            @endforeach
                        </select>
                        @error('selectedWarga')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
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
                
                    <button type="submit" class="btn btn-primary fw-bold">Buat Surat</button>
                </form>
            </div>
        </div>
    @endif
</div>
