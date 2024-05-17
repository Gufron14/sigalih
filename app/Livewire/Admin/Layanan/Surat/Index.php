<?php

namespace App\Livewire\Admin\Layanan\Surat;

use App\Livewire\Forms\SuratForm;
use App\Models\Surat;
use Livewire\Attributes\Title;
use Livewire\Component;
use Livewire\Attributes\Layout;

#[Layout('livewire.admin.layouts.app')]
#[Title('Daftar Surat')]
class Index extends Component
{   
    public SuratForm $form;

    public function delete(Surat $surat)
    {
        $this->form->delete($surat);
    }

    public function render()
    {
        $surats = Surat::all();
        return view('livewire.admin.layanan.surat.index', compact('surats'));
    }
}
