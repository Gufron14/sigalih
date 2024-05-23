<?php

namespace App\Livewire\Admin\Layanan\Pengajuan;

use Livewire\Component;
use App\Models\Pengajuan;
use Livewire\Attributes\Title;
use Barryvdh\DomPDF\Facade\Pdf;
use Livewire\Attributes\Layout;

#[Layout('livewire.admin.layouts.app')]
#[Title('Permohonan')]
class Show extends Component
{   
    public $pengajuan;
    public function mount($id)
    {
        $this->pengajuan = Pengajuan::with('warga', 'surat')->findOrFail($id);
    }

    public function downloadPDF()
    {
        $pdf = Pdf::loadView('livewire/admin/layanan/pengajuan/CreatePDF', ['pengajuan' => $this->pengajuan]);
        
        $pdf->setPaper('A4', 'potrait');

        return response()->streamDownload(function () use ($pdf) {
            echo $pdf->output();
        }, 'SKD-' . $this->pengajuan->warga->nama . '.pdf');
    }

    public function render()
    {
        return view('livewire.admin.layanan.pengajuan.show', [
            'pengajuans' => $this->pengajuan ]);
    }
}
