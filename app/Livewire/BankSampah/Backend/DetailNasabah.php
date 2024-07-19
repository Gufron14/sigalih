<?php

namespace App\Livewire\BankSampah\Backend;

use App\Livewire\BankSampah\Backend\Sampah\RiwayatSetoran;
use App\Models\User;
use Livewire\Component;
use Livewire\Attributes\Title;
use Livewire\Attributes\Layout;

#[Layout('livewire.bank-sampah.backend.layout.bs-layout')]
#[Title('Detail Nasabah')]
class DetailNasabah extends Component
{
    public $nasabah;
    public $pendapatan;

    public function mount($id)
    {
        $this->nasabah = User::findOrFail($id);
    }

    public function render()
    {
        return view('livewire.bank-sampah.backend.detail-nasabah', [
            'nasabah' => $this->nasabah,
        ]);
    }
}
