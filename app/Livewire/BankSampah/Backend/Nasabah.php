<?php

namespace App\Livewire\BankSampah\Backend;

use Livewire\Component;
use Livewire\Attributes\Title;
use Livewire\Attributes\Layout;

#[Title('Nasabah')]
#[Layout('livewire.bank-sampah.backend.layout.bs-layout')]

class Nasabah extends Component
{
    public function render()
    {   
        $nasabahs = \App\Models\User::all();
        return view('livewire.bank-sampah.backend.nasabah', [
            'nasabahs' => $nasabahs,
        ]);
    }
}
