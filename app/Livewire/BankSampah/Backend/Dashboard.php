<?php

namespace App\Livewire\BankSampah\Backend;

use App\Models\BankSampah\PenarikanSaldo;
use App\Models\BankSampah\RiwayatSetoran;
use App\Models\BankSampah\Tabungan;
use App\Models\DetailRiwayatSetoran;
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
    public $totalPendapatan;
    public $nasabah;
    public $totalSaldo = 0;
    public $totalPemasukan = 0;

    public function mount()
    {
       $this->totalBeratSampah = RiwayatSetoran::sum('total_berat_sampah');

       $this->totalPendapatan = RiwayatSetoran::where('jenis_transaksi', 'tunai')
        ->sum('total_pendapatan');

        $pengeluaran = PenarikanSaldo::where('status', 'selesai')
        ->sum('nominal');

        $this->totalPengeluaran = $this->totalPendapatan + $pengeluaran;

       $this->totalSaldo = $this->totalSaldo - $this->totalPengeluaran; 
       $this->totalPemasukan;
       $this->totalSaldo = $this->totalPemasukan + $this->totalSaldo;

       $this->nasabah = User::count();
    }

    public function render()
    {   
        return view('livewire.bank-sampah.backend.dashboard');
    }
}
