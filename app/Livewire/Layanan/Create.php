<?php

namespace App\Livewire\Layanan;

use App\Livewire\Forms\SuratForm;
use App\Models\Surat;
use Livewire\Component;

class Create extends Component
{   
    // Form Surat
    public SuratForm $form;

    public function store()
    {
        $this->form->store();
        
        return response()->json('OK');
        // return redirect()->route('surat.index');
    }

    public function render()
    {
        return view('livewire.layanan.create');
    }
}
