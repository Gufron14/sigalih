<?php

namespace App\Livewire\BankSampah\Backend;

use Livewire\Component;
use Livewire\Attributes\Title;
use Livewire\Attributes\Layout;

#[Layout('livewire.bank-sampah.backend.layout.bs-layout')]
#[Title('Tambah Pemasukan')]

class JualSampah extends Component
{   
    
    public function render()
    {
        return view('livewire.bank-sampah.backend.jual-sampah');
    }
}
