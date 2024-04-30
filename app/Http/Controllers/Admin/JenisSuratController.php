<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\JenisSurat;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class JenisSuratController extends Controller
{
    public function index()
    {   
        $jenis_surat = JenisSurat::all();
        return view('admin.resource.surat.jenis-surat', compact('jenis_surat'));
    }

    public function store(Request $request)
    {
        $validator = Validator::make(request()->all(), [
            'nama_surat' => 'required|unique:jenis_surats,nama_surat',
            'deskripsi' => 'required',
            'template' => 'required|max:10000|mimes:doc,docx',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator);
        }

        $template = $request->file('template');

        if ($template) {
            $templateName = $template->getClientOriginalName();
    
            // Check if file with the same name already exists
            if (file_exists(public_path('word-template') . '/' . $templateName)) {
                return redirect()
                    ->back()
                    ->withErrors(['template' => 'File template dengan nama yang sama sudah ada']);
            }
    
            $template->move(public_path('word-template'), $templateName);
        } else {
            return redirect()
                ->back()
                ->withErrors(['template' => 'File template tidak ditemukan']);
        }
    
        JenisSurat::create([
            'nama_surat' => $request->nama_surat,
            'deskripsi' => $request->deskripsi,
            'template' => $templateName,
        ]);
    
        return redirect()
            ->back()
            ->with(['success' => 'Berhasil menambahkan jenis surat']);
    }
}
