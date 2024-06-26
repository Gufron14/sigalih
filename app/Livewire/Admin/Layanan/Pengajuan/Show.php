<?php

namespace App\Livewire\Admin\Layanan\Pengajuan;

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

        $formField = FormField::where('jenis_surat_id', $this->pengajuan->jenisSurat->id)->first();

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
            'nomor_surat' => $this->pengajuan->nomor_surat,
            'tanggal_surat' => $this->pengajuan->tanggal_surat,
        ]);

        // Decode form data and set in template
        $formData = json_decode($this->pengajuan->form_data, true);

        if (!$formData) {
            session()->flash('error', 'Data form tidak ditemukan');
            return redirect()->back();
        }

        foreach ($formData as $key => $value) {
            $templateProcessor->setValue($key, "$value");
        }

        // Menyimpan dokumen sementara sebagai file .docx
        $filename = $this->pengajuan->jenisSurat->singkatan . '-' . $user->warga->nama . '.docx';
        $pathToSave = storage_path('app/public/templates/' . $filename);
        $templateProcessor->saveAs($pathToSave);

        // Konversi file Word menjadi PDF menggunakan ilovepdf 
        $ilovepdf = new Ilovepdf('project_public_2c27f90aa7df4963be8367251286fcc9_iSDLs2358d70cf1369adc7cb11b17b825d72a', 'secret_key_25fb2fe0707d23ecdbb7f13175eaa085_dW6SFd6d17c31c0e94c5aab7ee03b8fd5c981');
        $myTaskConvertOffice = $ilovepdf->newTask('officepdf');
        $file = $myTaskConvertOffice->addFile($pathToSave);
        $myTaskConvertOffice->execute();

        // Buat atau gunakan folder sementara untuk mengunduh file PDF
        $tempFolder = storage_path('app/public/temp');
        if (!File::isDirectory($tempFolder)) {
            File::makeDirectory($tempFolder, 0755, true);
        }

        $pdfFilename = $this->pengajuan->jenisSurat->singkatan . '-' . $user->warga->nama . '.pdf';
        $myTaskConvertOffice->download($tempFolder);

        $pdfPathToSave = storage_path('app/public/templates/' . $pdfFilename);
        File::move($tempFolder . '/' . $pdfFilename, $pdfPathToSave);

        // Hapus folder sementara
        File::deleteDirectory($tempFolder);

        $this->pengajuan->update([
            'file_surat' => 'templates/' . $pdfFilename,
        ]);

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
