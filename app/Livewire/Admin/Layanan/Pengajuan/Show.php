<?php

namespace App\Livewire\Admin\Layanan\Pengajuan;

use Dompdf\Dompdf;
use App\Models\User;
use Livewire\Component;
use App\Models\FileSurat;
use App\Models\FormField;
use App\Models\Pengajuan;
use App\Models\RequestSurat;
use Livewire\Attributes\Title;
use Barryvdh\DomPDF\Facade\Pdf;
use Livewire\Attributes\Layout;
use PhpOffice\PhpWord\IOFactory;
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
        $formField = FormField::firstOrFail();

        // Ambil file template yang terkait dengan jenis surat
        $fileSurat = $this->pengajuan->jenisSurat->fileSurat;

        // Pastikan file template ditemukan
        if (!$fileSurat) {
            session()->flash('error', 'template gak ada');
            return;
        }

        // Ambil jalur file template
        $filePath = storage_path('app/public/' . $fileSurat->file_path);

        if (!file_exists($filePath)) {
            session()->flash('error', 'File template surat tidak ditemukan');
            return redirect()->back();
        }

        $templateProcessor = new TemplateProcessor($filePath);

        // Set the user-related values in the template
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
        ]);

        // Decode form data and set in template
        $formData = json_decode($formField->form_data, true);

        // Check if the decoded data is an array
        if (is_array($formData)) {
            // Set values in template processor
            $templateProcessor->setValues($formData);
        }

        // Menyimpan dokumen sementara sebagai file .docx
        $filename = $this->pengajuan->jenisSurat->singkatan . '-' . $user->warga->nama . '.docx';
        $pathToSave = storage_path('app/public/templates/' . $filename);
        $templateProcessor->saveAs($pathToSave);

        return response()->download($pathToSave)->deleteFileAfterSend(true);
    }

    public function render()
    {
        return view('livewire.admin.layanan.pengajuan.show', [
            'pengajuan' => $this->pengajuan,
            'groupedPengajuan' => $this->groupedPengajuan ?? [],
        ]);
    }
}
