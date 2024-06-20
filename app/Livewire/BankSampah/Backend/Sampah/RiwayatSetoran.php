<?php

namespace App\Livewire\BankSampah\Backend\Sampah;

use App\Models\User;
use Livewire\Component;
use Livewire\Attributes\Title;
use Livewire\Attributes\Layout;
use Illuminate\Support\Arr;

#[Title('Riwayat Setor Sampah - Sampah Sigalih')]
#[Layout('livewire.bank-sampah.backend.layout.bs-layout')]
class RiwayatSetoran extends Component
{
    public $setorans;
    public $groupedSetorans;
    public $totalBerat = [];
    public $totalPendapatan = [];

    public function mount()
    {
        $this->setorans = \App\Models\BankSampah\RiwayatSetoran::with('jenisSampah', 'user.warga')->get();

        $groupedSetorans = [];
        
        foreach ($this->setorans as $setoran) {
            $nasabahId = $setoran->nasabah_id;
            if (!isset($groupedSetorans[$nasabahId])) {
                $groupedSetorans[$nasabahId] = [];
            }
            $groupedSetorans[$nasabahId][] = $setoran;
        }
        
        foreach ($groupedSetorans as $nasabahId => $setorans) {
            $this->totalBerat[$nasabahId] = collect($setorans)->sum('berat_sampah');
            $this->totalPendapatan[$nasabahId] = collect($setorans)->sum('pendapatan');
        }
    }

    public function render()
    {   
        $nasabahs = User::with('warga')->get();
        return view('livewire.bank-sampah.backend.sampah.riwayat-setoran', [
            'groupedSetorans' => $this->groupedSetorans,
            'totalBerat' => $this->totalBerat,
            'totalPendapatan' => $this->totalPendapatan,
            'nasabahs' => $nasabahs,
        ]);
    }
}
