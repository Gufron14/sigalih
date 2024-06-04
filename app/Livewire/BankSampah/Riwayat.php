<?php

namespace App\Livewire\BankSampah;

use Livewire\Component;
use Livewire\Attributes\Title;
use Livewire\Attributes\Layout;
use Illuminate\Support\Facades\Auth;

#[Layout('livewire.bank-sampah.layouts.app')]
#[Title('Riwayat Pendapatan Sampah')]
class Riwayat extends Component
{   
    public $warga;
    public $setorans;
    public $totalBerat = 0;
    public $totalPendapatan = 0;

    public function mount()
    {   
        $this->warga = Auth::user()->warga;

        $this->setorans = \App\Models\BankSampah\RiwayatSetoran::with('JenisSampah', 'user.warga')->get();

        $this->totalBerat = $this->setorans->sum('berat_sampah');
        $this->totalPendapatan = $this->setorans->sum('pendapatan');
    }
    public function render()
    {
        return view('livewire.bank-sampah.riwayat', [
            'setorans' => $this->setorans,
            'totalBerat' => $this->totalBerat,
            'totalPendapatan' => $this->totalPendapatan,
        ]);
    }
}
