<?php

namespace App\Livewire\Admin\Layanan\Surat;

use App\Livewire\Forms\SuratForm;
use Exception;
use App\Models\Surat;
use Livewire\Component;
use Illuminate\Support\Facades\File;

class Update extends Component
{   
    public SuratForm $form;

    public $showModal = false;
 
    public function save(Surat $surat)
    {
        $this->form->update($surat);
 
        return redirect()->route('surat.index');
    }

    public function showModal(Surat $surat)
    {
        $this->showModal = true;
    }

    public function render($id)
    {
        $surat = Surat::find($id);
        return view('livewire.admin.layanan.surat.update', compact('surat'));
    }
}
