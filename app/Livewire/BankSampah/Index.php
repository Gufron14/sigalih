<?php

namespace App\Livewire\BankSampah;

use App\Models\Warga;
use Livewire\Component;
use Livewire\Attributes\Title;
use Livewire\Attributes\Layout;
use Illuminate\Support\Facades\Auth;
use App\Models\BankSampah\RiwayatSetoran;
use App\Models\BankSampah\PenarikanSaldo;
use App\Models\BankSampah\Tabungan;

#[Layout('livewire.bank-sampah.layouts.app')]
#[Title('Bank Sampah - Desa Sirnagalih')]

class Index extends Component
{
    public $warga;
    public $tabungan;
    public $totalBeratSampah;
    public $nominal;
    public $saldo;
    public $pengeluaran;
    protected $rules = [
        'nominal' => 'required|numeric|min:10000',
    ];

    public function mount()
    {
        $this->warga = Auth::user()->warga;

        $this->tabungan = Tabungan::where('nasabah_id', Auth::user()->id)->firstOrFail();

        $this->totalBeratSampah = RiwayatSetoran::where('nasabah_id', Auth::user()->id)
            ->sum('total_berat_sampah');

        $this->nominal = 0;
    }

    public function tarikSaldo()
    {   
        if ($this->nominal < 10000 || $this->nominal >= 100000) {
            session()->flash('error', 'Nominal penarikan minimal Rp. 10.000 dan maksimal Rp. 100.000.');
            return;
        }
    
        $this->validate();

        $saldo = $this->tabungan->saldo;
        if ($this->nominal > $saldo) {
            session()->flash('error', 'Saldo tidak mencukupi.');
            return;
        }
    
        $penarikan = PenarikanSaldo::create([
            'nasabah_id' => auth()->user()->id,
            'nominal' => $this->nominal,
            'status' => 'pending',
        ]);
    
        session()->flash('success', 'Penarikan saldo berhasil diajukan. Mohon tunggu konfirmasi admin.');
    }

    public function render()
    {
        return view('livewire.bank-sampah.index', [
            'warga' => $this->warga,
            'tabungan' => $this->tabungan,
            'totalBeratSampah' => $this->totalBeratSampah,
        ]);
    }
}
