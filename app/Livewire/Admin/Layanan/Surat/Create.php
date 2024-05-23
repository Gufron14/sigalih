<?php

namespace App\Livewire\Admin\Layanan\Surat;

use App\Models\Surat;
use Livewire\Component;
use Livewire\Attributes\Rule;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\this;


class Create extends Component
{   
    use WithFileUploads;
    public $nama_surat;
    public $desc;
    public $template;

    protected $rules = [
        'nama_surat' => 'required|unique:surats,nama_surat',
        'desc' => 'required|string',
        'template' => 'max:1024|mimes:doc,docx', // Pastikan ini sesuai dengan aturan validasi Livewire
    ];

    public function store()
    {
        $this->validate();

        if ($this->template) {
            $templateName = $this->template->getClientOriginalName();

            // Check if file with the same name already exists
            if (file_exists(public_path('word-template') . '/' . $templateName)) {
                session()->flash('error', 'Template dengan nama tersebut sudah ada');
                return;
            }

            // Simpan file ke disk yang diinginkan
            $this->template->storeAs('word-template', $templateName);
        }

        Surat::create([
            'nama_surat' => $this->nama_surat,
            'desc' => $this->desc,
            'template' => $templateName
        ]);

        session()->flash('message', 'Data berhasil disimpan');
        return redirect()->route('surat.index');
    }

    public function render()
    {
        return view('livewire.admin.layanan.surat.create');
    }
}
