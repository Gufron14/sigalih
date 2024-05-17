<?php

namespace App\Http\Controllers\Admin\Surat;

use App\Contracts\SuratExportable;
use App\Models\Warga;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use PhpOffice\PhpWord\TemplateProcessor;

class SkckController extends Controller implements SuratExportable
{
    public function wordExport($id)
    {
        $warga = Warga::findOrFail($id);
        $templateProcessor = new TemplateProcessor('word-template/Surat Pengantar SKCK.docx');
        $templateProcessor->setValues([
            'nik' => $warga->nik,
            'nama' => $warga->nama,
            'ttl' => $warga->ttl,
            'jk' => $warga->jk,
            'alamat' => $warga->alamat,
            'rt' => $warga->rt,
            'rw' => $warga->rw,
            'desa' => $warga->desa,
            'kec' => $warga->kec,
            'kab' => $warga->kab,
            'agama' => $warga->agama,
            'pekerjaan' => $warga->pekerjaan,
            'kewarganegaraan' => $warga->kewarganegaraan,
            'created_at' => $warga->created_at->format('d F Y'),
        ]);

        $filename = 'SKD-' . $warga->nama;
        $pathToSave = 'pengajuan/' . $filename . '.docx';
        $templateProcessor->saveAs($pathToSave);

        return redirect()->back()->with('success', 'Surat Berhasil Dibuat');
    }
}
