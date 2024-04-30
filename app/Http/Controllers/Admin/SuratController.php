<?php

namespace App\Http\Controllers\Admin;

use App\Models\Surat;
use App\Models\Warga;
use App\Models\JenisSurat;
use Illuminate\Http\Request;
use PhpOffice\PhpWord\Settings;
use PhpOffice\PhpWord\IOFactory;
use App\Http\Controllers\Controller;
use PhpOffice\PhpWord\TemplateProcessor;
use Illuminate\Support\Facades\Validator;

class SuratController extends Controller
{
    public function index()
    {
        $surats = Surat::with(['warga', 'jenisSurat'])->get();

        // Membuat array untuk menyimpan format waktu masing-masing surat
        $timeFormats = [];

        foreach ($surats as $surat) {
            // Mengambil waktu pembuatan (created_at) dari setiap surat
            $yourDateTime = $surat->created_at;

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

        return view('admin.resource.surat.surat', compact('surats', 'timeFormat'));
    }

    public function show($id)
    {
        $surats = Surat::with('warga', 'jenisSurat')->findOrFail($id);
        return view('admin.resource.surat.view-surat', compact('surats'));
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nik' => 'required',
            'id_jenisSurat' => 'required|exists:jenis_surats,id_jenisSurat',
        ]);

        if ($validator->fails()) {
            return redirect()
                ->back()
                ->withErrors(['error' => 'Kesalahan']);
        }

        $jenisSurat = JenisSurat::where('id_jenisSurat', $request->id_jenisSurat)->first();
        if (!$jenisSurat) {
            return response(['error' => 'Surat belum ada']);
        }

        $warga = Warga::where('nik', $request->nik)->first();
        if (!$warga) {
            return response(['error' => 'NIK Tidak Terdaftar']);
        }

        Surat::create([
            'nik' => $warga->nik,
            'id_jenisSurat' => $jenisSurat->id_jenisSurat,
            'status' => 1, // Atur status default di sini, sesuai kebutuhan
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
