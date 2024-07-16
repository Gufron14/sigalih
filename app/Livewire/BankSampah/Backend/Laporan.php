<?php

namespace App\Livewire\BankSampah\Backend;

use App\Models\DetailRiwayatSetoran;
use Livewire\Component;
use Livewire\Attributes\Title;
use Livewire\Attributes\Layout;


#[Layout('livewire.bank-sampah.backend.layout.bs-layout')]
#[Title('Laporan Bank Sampah')]
class Laporan extends Component
{   
    public $pengeluarans;

    public function mount()
    {
        $this->pengeluarans = DetailRiwayatSetoran::all();
    }

    public function render()
    {
        return view('livewire.bank-sampah.backend.laporan', [
            'pengeluarans' => $this->pengeluarans
        ]);
    }
}
