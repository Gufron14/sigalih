<?php

namespace App\Livewire\Admin\Layanan\JenisSurat;

use Livewire\Component;
use App\Models\FileSurat;
use App\Models\JenisSurat;
use Livewire\WithFileUploads;
use Livewire\Attributes\Title;
use Livewire\Attributes\Layout;
use Illuminate\Support\Facades\Storage;

#[Layout('livewire.admin.layouts.app')]
#[Title('Edit Jenis Surat')]

class UpdateJenisSurat extends Component
{
    use WithFileUploads;

    public $suratId,
        $nama_surat,
        $desc,
        $singkatan,
        $file_path,
        $form_fields = [];

    protected $rules = [
        'nama_surat' => 'required|max:100',
        'desc' => 'required',
        'singkatan' => 'required|max:10',
        // 'file_path' => 'nullable|sometimes|max:1000|mimes:doc,docx',
        'form_fields' => 'nullable|array',
        'form_fields.*' => 'nullable|array',
        'form_fields.*.name' => 'required|string',
        'form_fields.*.type' => 'required|string|in:text,number,file',
    ];

    public function mount($id)
    {
        $jenisSurat = JenisSurat::findOrFail($id);

        if ($jenisSurat) {
            $this->suratId = $jenisSurat->id;
            $this->nama_surat = $jenisSurat->nama_surat;
            $this->desc = $jenisSurat->desc;
            $this->singkatan = $jenisSurat->singkatan;
            $this->file_path = $jenisSurat->fileSurat ? $jenisSurat->fileSurat->file_path : null;
            $this->form_fields = $jenisSurat->formFields->map(function ($formField) {
                return [
                    'name' => $formField->field_label,
                    'type' => $formField->field_type,
                ];
            })->toArray();
        }
    }

    public function update()
    {
        $validatedData = $this->validate();

        $jenisSurat = JenisSurat::findOrFail($this->suratId);

        $jenisSurat->nama_surat = $validatedData['nama_surat'];
        $jenisSurat->singkatan = $validatedData['singkatan'];
        $jenisSurat->desc = $validatedData['desc'];
        $jenisSurat->save();

        // Hapus form_fields sebelumnya
        $jenisSurat->formFields()->delete();

        // Simpan form_fields baru sebagai relasi dengan FormField
        foreach ($validatedData['form_fields'] as $field) {
            $jenisSurat->formFields()->create([
                'field_label' => $field['name'],
                'field_type' => $field['type'],
            ]);
        }

        // Hapus file surat sebelumnya jika ada
        if ($jenisSurat->fileSurat) {
            Storage::disk('public')->delete($jenisSurat->fileSurat->file_path);
            $jenisSurat->fileSurat()->delete();
        }

        // Simpan file surat baru jika ada
        if ($this->file_path) {
            $validatedFileData = $this->validate([
                'file_path' => 'nullable|max:1000|mimes:doc,docx',
            ]);

            $originalFilename = $validatedFileData['file_path']->getClientOriginalName();
            $path = $validatedFileData['file_path']->storeAs('templates', $originalFilename, 'public');

            // Buat instance FileSurat baru
            $fileSurat = new FileSurat([
                'file_path' => $path,
            ]);

            // Simpan FileSurat ke database dan hubungkan dengan JenisSurat
            $jenisSurat->fileSurat()->save($fileSurat);
        }

        $this->reset();
        session()->flash('success', 'Berhasil memperbarui Jenis Surat');

        return redirect()->back();
    }

    public function addFormField()
    {
        $this->form_fields[] = [
            'name' => '',
            'type' => '',
        ];
    }

    public function updated($propertyName)
    {
        if ($propertyName === 'file_path' && !$this->file_path) {
            $this->resetValidation('file_path');
        } else {
            $this->validateOnly($propertyName);
        }
    }

    public function removeFormField($index)
    {
        unset($this->form_fields[$index]);
        $this->form_fields = array_values($this->form_fields);
    }

    public function render()
    {
        return view('livewire.admin.layanan.jenis-surat.update-jenis-surat');
    }
}
