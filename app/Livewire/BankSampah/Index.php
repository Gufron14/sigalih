<?php

namespace App\Livewire\BankSampah;

use App\Models\Warga;
use Livewire\Component;
use Livewire\Attributes\Title;
use Livewire\Attributes\Layout;
use Illuminate\Support\Facades\Auth;

#[Layout('livewire.bank-sampah.layouts.app')]
#[Title('Bank Sampah - Desa Sirnagalih')]

class Index extends Component
{   
    public $warga;

    public function mount()
    {   
        $this->warga = Auth::user()->warga;
    }

    public function render()
    {
        return view('livewire.bank-sampah.index', ['warga' => $this->warga]);
    }
}
