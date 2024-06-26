<?php

namespace App\Livewire\Layanan;

use App\Models\Surat;
use Livewire\Component;
use App\Models\JenisSurat;
use App\Models\RequestSurat;
use Livewire\Attributes\Title;


#[Title('Layanan - Desa Sirnagalih')]
class Index extends Component
{
    public function render()
    {
        $surats = JenisSurat::all();
        $requestSurat = RequestSurat::all();

        return view('livewire.layanan.index', compact('surats', 'requestSurat'));
    }
}
