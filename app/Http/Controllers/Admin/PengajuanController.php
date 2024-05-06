<?php

namespace App\Http\Controllers\Admin;

use App\Models\Surat;
use App\Models\Warga;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Pengajuan;
use PhpOffice\PhpWord\TemplateProcessor;
use Illuminate\Support\Facades\Validator;

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

        return view('admin.resource.surat.pengajuan', compact('pengajuans', 'timeFormats'));
    }

    public function show($id)
    {
        $pengajuans = Pengajuan::with('warga', 'jenisSurat')->findOrFail($id);
        return view('admin.resource.surat.view-surat', compact('pengajuans'));
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nik' => 'required',
            'id_surat' => 'required|exists:pengajuans,id',
        ]);

        if ($validator->fails()) {
            return redirect()
                ->back()
                ->withErrors(['error' => 'Kesalahan']);
        }

        $surats = Surat::where('id_surat', $request->id_surat)->first();
        if (!$surats) {
            return response(['error' => 'Surat belum ada']);
        }

        $warga = Warga::where('nik', $request->nik)->first();
        if (!$warga) {
            return response(['error' => 'NIK Tidak Terdaftar']);
        }

        Surat::create([
            'nik' => $warga->nik,
            'id_surat' => $surats->id_surat,
        ]);

        return redirect()
            ->back()
            ->with(['success' => 'Berhasil']);
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
        $pathToSave = 'word-template/' . $filename . '.docx';
        $templateProcessor->saveAs($pathToSave);

        return redirect()->back()->with('success', 'Surat Berhasil Dibuat');
    }
}
