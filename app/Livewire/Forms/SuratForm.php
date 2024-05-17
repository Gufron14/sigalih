<?php

namespace App\Livewire\Forms;

use App\Models\Surat;
use Livewire\Attributes\Validate;
use Livewire\Form;
use Livewire\WithFileUploads;

class SuratForm extends Form
{
    use WithFileUploads;

    #[Validate('required|min:5')]
    public $nama_surat;
    
    #[Validate('nullable|min:3')]
    public $desc;
    
    #[Validate('required|mimes:doc,docx|max:1024')]
    public $template;
    
    // Create Surat
    public function store() 
    {
        $this->validate();
 
        Surat::create($this->all());
    }

    // Update Surat
    public function update(Surat $surat)
    {
        $surat->update();
    }

    // Delete Surat
    public function delete(Surat $surat)
    {
        $surat->delete();
    }
}
