<?php

namespace App\Livewire\Admin\Layanan\Pengajuan;

use App\Jobs\ConvertWordToPDF;
use Dompdf\Dompdf;
use Dompdf\Options;
use App\Models\User;
use Ilovepdf\Ilovepdf;
use Livewire\Component;
use App\Models\FormField;
use App\Models\RequestSurat;
use Livewire\Attributes\Title;
use Livewire\Attributes\Layout;
use PhpOffice\PhpWord\Settings;
use PhpOffice\PhpWord\IOFactory;
use PhpOffice\PhpWord\Writer\HTML;
use Illuminate\Support\Facades\File;
use PhpOffice\PhpWord\Shared\XMLWriter;
use PhpOffice\PhpWord\TemplateProcessor;

#[Layout('livewire.admin.layouts.app')]
#[Title('Permohonan')]
class Show extends Component
{
    public $jenisSurat;
    public $pengajuan;
    public $nomor_surat;
    public $tanggal_surat;
    public $catatan_admin;

    protected $rules = [
        'nomor_surat' => 'required',
        'tanggal_surat' => 'required',
        'catatan_admin' => 'required',
    ];

    public function mount($id)
    {
        $this->pengajuan = RequestSurat::with('user', 'jenisSurat')->findOrFail($id);

        $this->nomor_surat = $this->pengajuan->nomor_surat;
        $this->tanggal_surat = $this->pengajuan->tanggal_surat;
        $this->catatan_admin = $this->pengajuan->catatan_admin;
    }

    public function terimaPermohonan()
    {
        $this->validate();

        $this->pengajuan->update([
            'nomor_surat' => $this->nomor_surat,
            'tanggal_surat' => $this->tanggal_surat,
            'catatan_admin' => $this->catatan_admin,
            'status' => 'terima',
        ]);

        $user = User::with('warga')
            ->where('id', $this->pengajuan->user_id)
            ->firstOrFail();

        ConvertWordToPDF::dispatch($this->pengajuan, $user);

        session()->flash('success', 'Permohonan surat berhasil diterima.');
    }

    public function tolakPermohonan()
    {
        $this->validate(['catatan_admin' => 'required|string']);

        $this->pengajuan->update([
            'catatan_admin' => $this->catatan_admin,
            'status' => 'tolak',
        ]);

        session()->flash('success', 'Permohonan surat berhasil ditolak.');
    }

    public function render()
    {
        return view('livewire.admin.layanan.pengajuan.show', [
            'pengajuan' => $this->pengajuan,
            'groupedPengajuan' => $this->groupedPengajuan ?? [],
        ]);
    }
}
