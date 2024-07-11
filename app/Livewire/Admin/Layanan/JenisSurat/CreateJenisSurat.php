<?php

namespace App\Livewire\Admin\Layanan\JenisSurat;

use App\Models\FileSurat;
use Livewire\Component;
use App\Models\JenisSurat;
use Livewire\WithFileUploads;
use Livewire\Attributes\Title;
use Livewire\Attributes\Layout;

#[Layout('livewire.admin.layouts.app')]
#[Title('Buat Jenis Surat')]
class CreateJenisSurat extends Component
{
    use WithFileUploads;

    public $nama_surat,
        $desc,
        $singkatan,
        $file_path,
        $form_fields = [];

    protected $rules = [
        'nama_surat' => 'required|max:100',
        'desc' => 'required',
        'singkatan' => 'required|max:10',
        'file_path' => 'required|max:1000|mimes:doc,docx',
        'form_fields' => 'nullable|array',
        'form_fields.*' => 'nullable|array',
        'form_fields.*.name' => 'required|string',
        'form_fields.*.type' => 'required|string',
    ];

    public function store()
    {
        $validatedData = $this->validate();

        $jenisSurat = JenisSurat::create([
            'nama_surat' => $validatedData['nama_surat'],
            'desc' => $validatedData['desc'],
            'singkatan' => $validatedData['singkatan'],
        ]);

        // Simpan form_fields sebagai relasi dengan FormField
        foreach ($validatedData['form_fields'] as $field) {
            $jenisSurat->formFields()->create([
                'field_label' => $field['name'],
                'field_type' => $field['type'],
            ]);
        }

        // ...

        if ($this->file_path) {
            $originalFilename = $this->file_path->getClientOriginalName();
            $path = $this->file_path->storeAs('templates', $originalFilename, 'public');

            // Buat instance FileSurat baru
            $fileSurat = new FileSurat([
                'file_path' => $path,
            ]);

            // Simpan FileSurat ke database dan hubungkan dengan JenisSurat
            $jenisSurat->fileSurat()->save($fileSurat);
        }

        // ...

        $this->reset();

        session()->flash('success', 'Berhasil membuat Jenis Surat');

        return redirect()->route('surat');
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
        $this->validateOnly($propertyName);
    }

    public function removeFormField($index)
    {
        unset($this->form_fields[$index]);
        $this->form_fields = array_values($this->form_fields);
    }

    public function render()
    {
        return view('livewire.admin.layanan.jenis-surat.create-jenis-surat');
    }
}
