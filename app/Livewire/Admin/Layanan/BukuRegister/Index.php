<?php

namespace App\Livewire\Admin\Layanan\BukuRegister;

use App\Models\RequestSurat;
use Barryvdh\DomPDF\Facade\Pdf;
use Livewire\Component;
use Livewire\Attributes\Title;
use Livewire\Attributes\Layout;

#[Layout('livewire.admin.layouts.app')]
#[Title('Buku Register')]
class Index extends Component
{   
    public function downloadPdf()
    {
        $registers = RequestSurat::where('status', 'terima')->get();
        $pdf = Pdf::loadView('livewire.admin.layanan.buku-register.buku-register', [
            'registers' => $registers,
        ])->setPaper('a4', 'landscape');
    
        return response()->streamDownload(function() use ($pdf) {
            echo $pdf->output();
        }, 'buku-register.pdf');
    }

    public function render()
    {
        $registers = RequestSurat::where('status', 'terima')->get();
        return view('livewire.admin.layanan.buku-register.index', compact('registers'));
    }
}
