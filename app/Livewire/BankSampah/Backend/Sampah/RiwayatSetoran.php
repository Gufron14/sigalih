<?php

namespace App\Livewire\BankSampah\Backend\Sampah;
;
use App\Models\User;
use Livewire\Component;
use Livewire\Attributes\Title;
use Livewire\Attributes\Layout;

#[Title('Riwayat Setor Sampah - Sampah Sigalih')]
#[Layout('livewire.bank-sampah.backend.layout.bs-layout')]
class RiwayatSetoran extends Component
{
    public $setorans;
    public $totalBerat = 0;
    public $totalPendapatan = 0;

    public function mount()
    {
        $this->setorans = \App\Models\BankSampah\RiwayatSetoran::with('JenisSampah', 'user.warga')->get();

        $this->totalBerat = $this->setorans->sum('berat_sampah');
        $this->totalPendapatan = $this->setorans->sum('pendapatan');
    }

    public function render()
    {   
        $nasabahs = User::with('warga')->get();
        return view('livewire.bank-sampah.backend.sampah.riwayat-setoran', [
            'setorans' => $this->setorans,
            'totalBerat' => $this->totalBerat,
            'totalPendapatan' => $this->totalPendapatan,
            'nasabahs' => $nasabahs,
        ]);
    }
}
