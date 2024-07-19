<?php

namespace App\Livewire\BankSampah\Backend;

use App\Models\BankSampah\Backend\Pemasukan;
use App\Models\BankSampah\PenarikanSaldo;
use App\Models\BankSampah\RiwayatSetoran;
use App\Models\BankSampah\Tabungan;
use App\Models\DetailRiwayatSetoran;
use App\Models\User;
use Livewire\Component;
use Livewire\Attributes\Title;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Validate;

#[Layout('livewire.bank-sampah.backend.layout.bs-layout')]
#[Title('Dashboard Bank Sampah')]
class Dashboard extends Component
{   
    public $totalBeratSampah;
    public $totalPengeluaran;
    public $totalPendapatan;
    public $grandTotalPengeluaran;
    public $nasabah;
    public $totalSaldo = 0;
    public $totalPemasukan;
    public $ket, $nominal, $desc;

    public function store()
    {
        $this->validate([
            'ket' => 'required',
            'nominal' => 'required|numeric',
            'desc' => 'nullable'
        ]);

        Pemasukan::create([
            'ket' => $this->ket,
            'nominal' => $this->nominal,
            'desc' => $this->desc
        ]);

        session()->flash('success', 'Berhasil Menambahkan Pemasukan');
        return redirect()->route('bs.dashboard');
    }

    public function mount()
    {
        $this->totalBeratSampah = RiwayatSetoran::sum('total_berat_sampah');

        // Pemasukan
        $this->totalPemasukan = Pemasukan::sum('nominal');

        // Pengeluaran
        $this->totalPendapatan = RiwayatSetoran::where('jenis_transaksi', 'tunai')->sum('total_pendapatan');
        $this->totalPengeluaran = PenarikanSaldo::where('status', 'selesai')->sum('nominal');
        $this->grandTotalPengeluaran = $this->totalPendapatan + $this->totalPengeluaran;

        // Total Saldo
        $this->totalSaldo = $this->totalPemasukan - $this->grandTotalPengeluaran;

        $this->nasabah = User::count();
    }

    public function render()
    {   
        return view('livewire.bank-sampah.backend.dashboard');
    }
}
