<?php

namespace App\Livewire\Admin\Layanan\Surat;

use App\Livewire\Forms\SuratForm;
use App\Models\Surat;
use Livewire\Component;
use Livewire\Attributes\Title;
use Livewire\Attributes\Layout;

#[Layout('livewire.admin.layouts.app')]
#[Title('Daftar Surat')]
class Index extends Component
{  

    public function delete($id)
    {
        $surat = Surat::findOrFail($id);
        $surat->delete();
    }

    public function render()
    {
        $surats = Surat::all();
        return view('livewire.admin.layanan.surat.index', compact('surats'));
    }
}
