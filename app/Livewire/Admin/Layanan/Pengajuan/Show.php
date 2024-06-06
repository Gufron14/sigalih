<?php

namespace App\Livewire\Admin\Layanan\Pengajuan;

use App\Models\User;
use Livewire\Component;
use App\Models\FileSurat;
use App\Models\FormField;
use App\Models\Pengajuan;
use App\Models\RequestSurat;
use Livewire\Attributes\Title;
use Barryvdh\DomPDF\Facade\Pdf;
use Livewire\Attributes\Layout;
use PhpOffice\PhpWord\TemplateProcessor;

#[Layout('livewire.admin.layouts.app')]
#[Title('Permohonan')]
class Show extends Component
{
    public $jenisSurat;
    public $pengajuan;
    public function mount($id)
    {
        $this->pengajuan = RequestSurat::with('user', 'jenisSurat')->findOrFail($id);
    }

    public function lihatPdf()
    {
        $user = User::with('warga')
            ->where('id', $this->pengajuan->user_id)
            ->firstOrFail();
        $formFields = FormField::firstOrFail();

        // Ambil file template yang terkait dengan jenis surat
        $fileSurat = $this->pengajuan->jenisSurat->fileSurat;

        // Pastikan file template ditemukan
        if (!$fileSurat) {
            session()->flash('error', 'template gak ada');
        }

        // Ambil jalur file template
        $filePath = storage_path('app/public/' . $fileSurat->file_path);

        if (file_exists($filePath)) {
            $templateProcessor = new TemplateProcessor($filePath);
        } else {
            session()->flash('error', 'File template surat tidak ditemukan');
            return redirect()->back();
        }

        $templateProcessor->setValues([
            'nama' => $user->warga->nama,
            'nik' => $user->warga->nik,
            'ttl' => $user->warga->ttl,
            'jk' => $user->warga->jk,
            'alamat' => $user->warga->alamat,
            'rt' => $user->warga->rt,
            'rw' => $user->warga->rw,
            'desa' => $user->warga->desa,
            'kec' => $user->warga->kec,
            'kab' => $user->warga->kab,
            'agama' => $user->warga->agama,
            'status' => $user->warga->status,
            'pekerjaan' => $user->warga->pekerjaan,

            //'form_data' => $this->parseFormData(json_decode($formFields->form_data)),
        ]);

        $formData = json_decode($formFields->form_data, true);

        if (is_array($formData)) {
            foreach ($formData as $key => $value) {
                $templateProcessor->setValue($key, $value);
            }
        } 
        

        // Menyimpan dokumen sementara sebagai file .docx
        $filename = $this->pengajuan->jenisSurat->singkatan . '-' . $user->warga->nama . '.docx';
        $pathToSave = storage_path('app/public/templates/' . $filename);
        $templateProcessor->saveAs($pathToSave);
        // // Konversi dokumen .docx ke PDF
        // $pdfPath = $this->convertToPdf($pathToSave);

        // // Tampilkan PDF di browser
        // return response()->file($pdfPath);
    }

    protected function parseFormData($formData)
    {
        if (is_null($formData)) {
            return ''; // Kembalikan string kosong jika formData adalah null
        }

        $parsedData = [];

        foreach ($formData as $key => $value) {
            $parsedData[] = "$key: $value";
        }

        return implode(', ', $parsedData);
    }

    protected function convertToPdf($docxPath)
    {
        $pdfPath = str_replace('.docx', '.pdf', $docxPath);
        // Menggunakan LibreOffice untuk mengonversi ke PDF
        $command = 'libreoffice --headless --convert-to pdf --outdir ' . dirname($pdfPath) . ' ' . $docxPath;
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
