<?php

namespace App\Livewire\Berita;

use Livewire\Attributes\Title;
use Livewire\Component;


#[Title('Kabar Sirnagalih')]
class Show extends Component
{
    public function render()
    {
        return view('livewire.berita.show');
    }
}
