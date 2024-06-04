<?php

namespace App\Livewire\Admin\Layanan\JenisSurat;

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
        $form_fields = [];

    protected $rules = [
        'nama_surat' => 'required|max:100',
        'desc' => 'required',
        'singkatan' => 'required|max:10',
        'form_fields.*' => 'nullable|array',
        'form_fields.*.name' => 'required|string',
        'form_fields.*.rules' => 'required|string',
    ];

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function store()
    {
        $this->validate();

        $jenisSurat = JenisSurat::create([
            'nama_surat' => $this->nama_surat,
            'desc' => $this->desc,
            'singkatan' => $this->singkatan,
            'form_fields' => $this->form_fields,
        ]);

        // Simpan form_fields sebagai relasi dengan FormField
        foreach ($this->form_fields as $field) {
            $jenisSurat->formFields()->create([
                'field_name' => $field['name'],
                'field_label' => $field['name'], // Atau sesuaikan dengan kebutuhan Anda
                'field_type' => $field['rules'], // Atau sesuaikan dengan kebutuhan Anda
                'rules' => $field['rules'], // Isi dengan aturan validasi yang sesuai
            ]);
        }

        $this->reset();

        session()->flash('success', 'Berhasil membuat Jenis Surat');

        return redirect()->back();
    }

    public function addFormField()
    {
        $this->form_fields[] = ['name' => '', 'rules' => ''];
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
