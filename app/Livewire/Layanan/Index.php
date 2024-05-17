<?php

namespace App\Livewire\Layanan;

use App\Models\Surat;
use Livewire\Component;
use Livewire\Attributes\Title;


#[Title('Layanan')]
class Index extends Component
{
    public function render()
    {
        $surats = Surat::all();

        return view('livewire.layanan.index', compact('surats'));
    }
}
