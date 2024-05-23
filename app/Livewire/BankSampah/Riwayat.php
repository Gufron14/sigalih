<?php

namespace App\Livewire\BankSampah;

use Livewire\Component;
use Livewire\Attributes\Title;
use Livewire\Attributes\Layout;

#[Layout('livewire.bank-sampah.layouts.app')]
#[Title('Riwayat')]
class Riwayat extends Component
{
    public function render()
    {
        return view('livewire.bank-sampah.riwayat');
    }
}
