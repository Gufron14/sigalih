<?php

namespace App\Livewire\BankSampah;

use Livewire\Component;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;

#[Layout('livewire.bank-sampah.layouts.app')]
#[Title('Bank Sampah - Desa Sirnagalih')]

class Index extends Component
{
    public function render()
    {
        return view('livewire.bank-sampah.index');
    }
}
