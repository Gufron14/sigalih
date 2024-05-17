<?php

namespace App\Livewire;

use App\Models\Surat;
use Livewire\Attributes\Title;
use Livewire\Component;


#[Title('Beranda')]
class Home extends Component
{
    public function render()
    {   
        $surats = Surat::latest()->take('3')->get();

        return view('livewire.home', compact('surats'));
    }
}
