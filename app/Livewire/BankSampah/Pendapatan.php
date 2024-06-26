<?php

namespace App\Livewire\BankSampah;

use Livewire\Component;
use Livewire\Attributes\Title;
use Livewire\Attributes\Layout;
use Illuminate\Support\Facades\Auth;
use App\Models\BankSampah\PenarikanSaldo;

#[Layout('livewire.bank-sampah.layouts.app')]
#[Title('Pendapatan')]

class Pendapatan extends Component
{
    public $warga;
    public $riwayatSetorans;

    public function mount()
    {
        $this->warga = Auth::user()->warga;

        $this->riwayatSetorans = \App\Models\BankSampah\RiwayatSetoran::with('riwayatSetoranDetails.jenisSampah')
            ->where('nasabah_id', Auth::user()->id)
            ->orderBy('created_at', 'desc')
            ->get();
    }

    public function render()
    {
        $penarikanSaldo = PenarikanSaldo::where('nasabah_id', Auth::user()->id)->get();

        return view('livewire.bank-sampah.pendapatan', [
            'riwayatSetorans' => $this->riwayatSetorans,
            'penarikanSaldo' => $penarikanSaldo,

        ]);
    }
}
