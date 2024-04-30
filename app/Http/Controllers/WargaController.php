<?php

namespace App\Http\Controllers;

use Dompdf\Dompdf;
use App\Models\Warga;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use PhpOffice\PhpWord\Settings;
use PhpOffice\PhpWord\IOFactory;
use PhpOffice\PhpWord\TemplateProcessor;

class WargaController extends Controller
{
    public function index()
    {
        $wargas = Warga::all();
        return view('admin.resource.kependudukan.warga.index', compact('wargas'));
    }

    public function show($id)
    {
        $warga = Warga::findOrFail($id);
        return view('warga.show', compact('warga'));
    }

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
            'stts_perkawinan' => $warga->stts_perkawinan,
            'pekerjaan' => $warga->pekerjaan,
            'kewarganegaraan' => $warga->kewarganegaraan,
            'created_at' => $warga->created_at->format('d F Y'),
        ]);

        $filename = 'SKD-' . $warga->nama;
        $pathToSave = 'download/' . $filename . '.docx';
        $templateProcessor->saveAs($pathToSave);
        
        // $domPdfPath = base_path('vendor/dompdf/dompdf');

        // Settings::setPdfRendererPath($domPdfPath);
        // Settings::setPdfRendererName('DomPDF');

        // $content = IOFactory::load($pathToSave);

        // $pdfWriter = IOFactory::createWriter($content);
        // $pdfWriter->save($pathToSave);
        

        return response()->download($pathToSave);
    }
}
