<?php

namespace App\Livewire\Layanan;

use App\Models\JenisSurat;
use App\Models\RequestSurat;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\Attributes\Title;

#[Title('Riwayat Pengajuan - Desa Sirnagalih')]
class RiwayatPengajuan extends Component
{
    public $riwayat;
    public $riwayatPengajuan;
    public $jenisSurat;

    public function mount()
    {
        $this->riwayat = Auth::user()->riwayat;
        // $this->jenisSurat = JenisSurat::where('nama_surat', $nama_surat)->firstOrFail();
        $this->riwayatPengajuan = RequestSurat::with('jenisSurat')
            ->where('user_id', Auth::user()->id)
            ->orderBy('created_at', 'desc')->get();
    }

    public function render()
    {
        return view('livewire.layanan.riwayat-pengajuan', [
            'riwayatPengajuan' => $this->riwayatPengajuan,
            // 'jenisSurat' => $this->jenisSurat,
        ]);
    }
}
