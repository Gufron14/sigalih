<?php

namespace App\Livewire\Admin\Layanan\Pengajuan;

use Livewire\Component;
use App\Models\Pengajuan;
use App\Models\RequestSurat;
use Livewire\Attributes\Title;
use Livewire\Attributes\Layout;

#[Layout('livewire.admin.layouts.app')]
#[Title('Daftar Permohonan')]
class Index extends Component
{
    public function render()
    {
        $pengajuans = RequestSurat::with(['user.warga', 'warga', 'jenisSurat'])->orderBy('created_at', 'desc')->get();

        return view('livewire.admin.layanan.pengajuan.index', compact('pengajuans'));
    }
}
