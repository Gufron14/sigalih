<?php

namespace App\Http\Controllers\Admin;

use App\Models\Surat;
use App\Models\Warga;
use App\Models\Pengajuan;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use PhpOffice\PhpWord\TemplateProcessor;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\Admin\Surat\SKDController;
use App\Http\Controllers\Admin\Surat\SkckController;

class PengajuanController extends Controller
{
    public function index()
    {
        $pengajuans = Pengajuan::with(['warga', 'surat'])->get();

        // Membuat array untuk menyimpan format waktu masing-masing surat
        $timeFormats = [];

        foreach ($pengajuans as $pengajuan) {
            // Mengambil waktu pembuatan (created_at) dari setiap surat
            $yourDateTime = $pengajuan->created_at;

            // Hitung perbedaan waktu
            $timeDiff = now()->diffInMinutes($yourDateTime);
            $timeFormat = '';

            if ($timeDiff < 60) {
                $timeFormat = $timeDiff . ' menit lalu';
            } elseif ($timeDiff < 1440) {
                $timeFormat = floor($timeDiff / 60) . ' jam lalu';
            } elseif ($timeDiff < 525600) {
                $timeFormat = $yourDateTime->diffForHumans();
            } else {
                $timeFormat = $yourDateTime->format('d M Y');
            }

            // Menyimpan format waktu untuk surat saat ini ke dalam array
            $timeFormats[] = $timeFormat;
        }

        // return response()->json([
        //     'surat' => $pengajuan
        // ]);

        return view('admin.resource.surat.pengajuan', compact('pengajuans', 'timeFormat'));
    }

    public function show($id)
    {
        $pengajuans = Pengajuan::with('warga', 'surat')->findOrFail($id);
        return view('admin.resource.surat.view-pengajuan', compact('pengajuans'));
    }

    // protected $SkckController;

    // public function __construct(SkckController $SkckController)
    // {
    //     $this->SkckController = $SkckController;
    // }

    public function createSurat($jenis, $id)
    {
        $controllerMap = [
            'skck' => SkckController::class,
            'skd' => SKDController::class,
        ];

        if (!array_key_exists($jenis, $controllerMap)) {
            return response()->json(['error' => 'Jenis surat tidak ditemukan'], 404);
        }

        $controllerClass = app($controllerMap[$jenis]);
        return $controllerClass->wordExport($id);
    }


    // public function wordExport($id)
    // {
    //     $warga = Warga::findOrFail($id);
    //     $templateProcessor = new TemplateProcessor('word-template/Surat-Keterangan-Domisili.docx');
    //     $templateProcessor->setValues([
    //         'id' => $warga->id,
    //         'nik' => $warga->nik,
    //         'nama' => $warga->nama,
    //         'ttl' => $warga->ttl,
    //         'jk' => $warga->jk,
    //         'alamat' => $warga->alamat,
    //         'rt' => $warga->rt,
    //         'rw' => $warga->rw,
    //         'desa' => $warga->desa,
    //         'agama' => $warga->agama,
    //         'stts_perkawinan' => $warga->stts_perkawinan,
    //         'pekerjaan' => $warga->pekerjaan,
    //         'kewarganegaraan' => $warga->kewarganegaraan,
    //         'created_at' => $warga->created_at->format('d F Y'),
    //     ]);

    //     $filename = 'SKD-' . $warga->nama;
    //     $pathToSave = 'pengajuan/' . $filename . '.docx';
    //     $templateProcessor->saveAs($pathToSave);

    //     return redirect()->back()->with('success', 'Surat Berhasil Dibuat');
    // }
}
