<?php

namespace App\Livewire\BankSampah\Backend;

use App\Models\BankSampah\RiwayatSetoran;
use App\Models\BankSampah\Tabungan;
use App\Models\User;
use Livewire\Component;
use Livewire\Attributes\Title;
use Livewire\Attributes\Layout;


#[Layout('livewire.bank-sampah.backend.layout.bs-layout')]
#[Title('Dashboard Bank Sampah')]
class Dashboard extends Component
{   
    public $totalBeratSampah;
    public $totalPengeluaran;
    public $nasabah;

    public function mount()
    {
       $this->totalBeratSampah = RiwayatSetoran::sum('total_berat_sampah');
       $this->totalPengeluaran = Tabungan::sum('pemasukan');
       $this->nasabah = User::count();
    }

    public function render()
    {   
        return view('livewire.bank-sampah.backend.dashboard');
    }
}
