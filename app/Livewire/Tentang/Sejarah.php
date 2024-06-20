<?php

namespace App\Livewire\Tentang;

use Livewire\Component;
use Livewire\Attributes\Title;


#[Title('Tentang Desa Sirnagalih')]
class Sejarah extends Component
{
    public function render()
    {
        return view('livewire.tentang.sejarah');
    }
}
