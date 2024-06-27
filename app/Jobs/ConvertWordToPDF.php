<?php

namespace App\Jobs;

use Ilovepdf\Ilovepdf;
use App\Models\FormField;
use Carbon\Carbon;
use DateTime;
use Illuminate\Bus\Queueable;
use Illuminate\Support\Facades\File;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use PhpOffice\PhpWord\TemplateProcessor;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;

class ConvertWordToPDF implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public $pengajuan;
    public $user;

    /**
     * Create a new job instance.
     */
    public function __construct($pengajuan, $user)
    {
        $this->pengajuan = $pengajuan;
        $this->user = $user;
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        FormField::where('jenis_surat_id', $this->pengajuan->jenisSurat->id)->first();

        // Ambil file template yang terkait dengan jenis surat
        $fileSurat = $this->pengajuan->jenisSurat->fileSurat;

        // Ambil jalur file template
        $filePath = storage_path('app/public/' . $fileSurat->file_path);

        $templateProcessor = new TemplateProcessor($filePath);

        // Set the this$this->user-related values in the template
        $templateProcessor->setValues([
            'nama' => $this->user->warga->nama,
            'nik' => $this->user->warga->nik,
            'ttl' => $this->user->warga->ttl,
            'jk' => $this->user->warga->jk,
            'alamat' => $this->user->warga->alamat,
            'rt' => $this->user->warga->rt,
            'rw' => $this->user->warga->rw,
            'desa' => $this->user->warga->desa,
            'kec' => $this->user->warga->kec,
            'kab' => $this->user->warga->kab,
            'agama' => $this->user->warga->agama,
            'status' => $this->user->warga->status,
            'pekerjaan' => $this->user->warga->pekerjaan,
            'nomor_surat' => $this->pengajuan->nomor_surat,
            'tanggal_surat' => Carbon::parse($this->pengajuan->tanggal_surat)->translatedFormat('d F Y'),
        ]);

        // Decode form data and set in template
        $formData = json_decode($this->pengajuan->form_data, true);

        if (!$formData) {
            session()->flash('error', 'Data form tidak ditemukan');
            // return redirect()->back();
        }

        foreach ($formData as $key => $value) {
            $templateProcessor->setValue($key, "$value");
        }

        // Menyimpan dokumen sementara sebagai file .docx
        $filename = $this->pengajuan->jenisSurat->singkatan . '-' . $this->user->warga->nama . '.docx';
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

        $pdfFilename = $this->pengajuan->jenisSurat->singkatan . '-' . $this->user->warga->nama . '.pdf';
        $myTaskConvertOffice->download($tempFolder);

        $pdfPathToSave = storage_path('app/public/templates/' . $pdfFilename);
        File::move($tempFolder . '/' . $pdfFilename, $pdfPathToSave);

        // Hapus file .docx setelah konversi selesai
        File::delete($pathToSave);

        // Hapus folder sementara
        File::deleteDirectory($tempFolder);

        $this->pengajuan->update([
            'file_surat' => 'templates/' . $pdfFilename,
        ]);
    }
}
