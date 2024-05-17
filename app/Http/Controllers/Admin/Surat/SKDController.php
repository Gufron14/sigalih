<?php

namespace App\Http\Controllers\Admin\Surat;

use App\Contracts\SuratExportable;
use App\Models\Warga;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use PhpOffice\PhpWord\TemplateProcessor;

class SKDController extends Controller implements SuratExportable
{
    public function wordExport($id)
    {
        $warga = Warga::findOrFail($id);
        $templateProcessor = new TemplateProcessor('word-template/Surat-Keterangan-Domisili.docx');
        $templateProcessor->setValues([
            'id' => $warga->id,
            'nik' => $warga->nik,
            'nama' => $warga->nama,
            'ttl' => $warga->ttl,
            'jk' => $warga->jk,
            'alamat' => $warga->alamat,
            'rt' => $warga->rt,
            'rw' => $warga->rw,
            'desa' => $warga->desa,
            'agama' => $warga->agama,
            'stts' => $warga->status,
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
