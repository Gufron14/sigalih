<?php

namespace App\Livewire\Admin\Layanan\Pengajuan;

use Livewire\Component;
use App\Models\Pengajuan;
use App\Models\RequestSurat;
use App\Models\User;
use Livewire\Attributes\Title;
use Barryvdh\DomPDF\Facade\Pdf;
use Livewire\Attributes\Layout;
use PhpOffice\PhpWord\TemplateProcessor;

#[Layout('livewire.admin.layouts.app')]
#[Title('Permohonan')]
class Show extends Component
{
    public $pengajuan;
    public function mount($id)
    {
        $this->pengajuan = RequestSurat::with('user', 'jenisSurat', 'formField')->findOrFail($id);
    }

    public function lihatPdf()
    {
        $user = User::with('warga', 'formFields')->where('id', $this->pengajuan->user_id)->firstOrFail();

        $templateProcessor = new TemplateProcessor($this->pengajuan->jenisSurat->fileSurat->file_path); 

        $templateProcessor->setValues([
            'nama' => $user->warga->nama,
            'nik' => $user->warga->nik,
            'form_data' => json_decode($user->formFields->form_data),
        ]);

      // Menyimpan dokumen sementara sebagai file .docx
        $filename = $this->pengajuan->jenisSurat->singkatan . '-' . $user->warga->nama . '.docx';
        $pathToSave = storage_path('app/public/surat/' . $filename);
        $templateProcessor->saveAs($pathToSave);

        // Konversi dokumen .docx ke PDF
        $pdfPath = $this->convertToPdf($pathToSave);

        // Tampilkan PDF di browser
        return response()->file($pdfPath);
    }

    protected function convertToPdf($docxPath)
    {
        $pdfPath = str_replace('.docx', '.pdf', $docxPath);
        // Menggunakan LibreOffice untuk mengonversi ke PDF
        $command = "libreoffice --headless --convert-to pdf --outdir " . dirname($pdfPath) . " " . $docxPath;
        shell_exec($command);

        if (file_exists($pdfPath)) {
            return response()->file($pdfPath)->deleteFileAfterSend(true);
        } else {
            session()->flash('error', 'Konversi ke PDF gagal');
        }
    }

    public function downloadPDF()
    {
        $pdf = Pdf::loadView('livewire/admin/layanan/pengajuan/CreatePDF', ['pengajuan' => $this->pengajuan]);

        $pdf->setPaper('A4', 'potrait');

        return response()->streamDownload(function () use ($pdf) {
            echo $pdf->output();
        }, 'SKD-' . $this->pengajuan->user->warga->nama . '.pdf');
    }

    public function render()
    {
        return view('livewire.admin.layanan.pengajuan.show', [
            'pengajuan' => $this->pengajuan,
        ]);
    }
}
