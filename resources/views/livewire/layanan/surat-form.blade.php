<div class="container p-5">
    @if (session()->has('message'))
        <div class="alert alert-success">{{ session('message') }}</div>
    @endif

    <form wire:submit.prevent="submit">
        <div class="mb-3">
            <label for="jenisSurat" class="form-label">Jenis Surat</label>
            <select wire:model="selectedJenisSurat" id="jenisSurat" class="form-select">
                <option value="">Pilih Jenis Surat</option>
                @foreach($JenisSurat as $jenisSurat)
                    <option value="{{ $jenisSurat->id }}">{{ $jenisSurat->nama_surat }}</option>
                @endforeach
            </select>
        </div>

        @if ($selectedJenisSurat)
            @foreach($formFields as $field)
                <div class="mb-3">
                    <label for="{{ $field->field_name }}" class="form-label">{{ $field->field_label }}</label>
                    <input 
                    type="{{ $field->field_type }}" 
                        id="{{ $field->field_name }}" 
                        class="form-control" 
                        wire:model="formData.{{ $field->field_name }}">
                    @error('formData.' . $field->field_name) 
                        <span class="text-danger">{{ $message }}</span> 
                    @enderror
                </div>
            @endforeach
        @endif

        <button type="submit" class="btn btn-primary">Ajukan Surat</button>
    </form>
</div>
