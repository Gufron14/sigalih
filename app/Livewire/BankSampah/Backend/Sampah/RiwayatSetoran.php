<?php

namespace App\Livewire\BankSampah\Backend\Sampah;

use App\Models\User;
use Livewire\Component;
use Livewire\Attributes\Title;
use Livewire\Attributes\Layout;

#[Title('Riwayat Setor Sampah - Sampah Sigalih')]
#[Layout('livewire.bank-sampah.backend.layout.bs-layout')]
class RiwayatSetoran extends Component
{
    public function render()
    {
        $riwayatSetorans = \App\Models\BankSampah\RiwayatSetoran::join('users', 'riwayat_setorans.nasabah_id', '=', 'users.id')
            ->join('wargas', 'users.NIK', '=', 'wargas.NIK')
            ->select('riwayat_setorans.*', 'wargas.nama as nama_warga')
            ->with('riwayatSetoranDetails.jenisSampah')
            ->orderBy('riwayat_setorans.created_at', 'desc')
            ->get();
    
        return view('livewire.bank-sampah.backend.sampah.riwayat-setoran', compact('riwayatSetorans'));
    }
    
}
