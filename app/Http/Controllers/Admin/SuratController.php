<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Admin\Surat\SkckController;
use App\Models\Surat;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Exception;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Validator;

class SuratController extends Controller
{
    public function index()
    {   
        $surats = Surat::all();

        return response()->json([
            'surat' => $surats
        ]);
    }

    public function store(Request $request)
    {
        $validator = Validator::make(request()->all(), [
            'nama_surat' => 'required|unique:surats,nama_surat',
            'desc' => 'nullable',
            'template' => 'required|max:10000|mimes:doc,docx',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'message' => $validator->messages()
            ]);
        }

        $template = $request->file('template');

        if ($template) {
            $templateName = $template->getClientOriginalName();
    
            // Check if file with the same name already exists
            if (file_exists(public_path('word-template') . '/' . $templateName)) {
                return response()->json([
                    'message' => 'Template dengan nama tersebut sudah ada'
                ]);
            }
    
            $template->move(public_path('word-template'), $templateName);
        } else {
            return response()->json([
                'error' => 'template tidak ditemukan'
            ]);
        }
    
        Surat::create([
            'nama_surat' => $request->nama_surat,
            'desc' => $request->desc,
            'template' => $templateName,
        ]);

        return response()->json([
            'status' => true,
            'message' => 'Berhasil menambahkan Surat'
        ]);
    
    }

    public function show($id)
    {
        $surat = Surat::findOrFail($id);
        
        return response()->json([
            'surat' => $surat
        ]);
    }

    public function edit(Surat $surat)
    {
        try {
            return view('admin.resource.surat.surat', compact('surat'));
        } catch (Exception $e) {
            return response()->json([
                'status' => false,
                'message' => 'ID tidak ditemukan'
            ], 404);
        }
        
    }

    public function update(Request $request, Surat $surat, $id)
    {
        $validator = Validator::make($request->all(), [
            'nama_surat' => 'nullable|max:100',
            'desc' => 'nullable',
            'template' => 'nullable|max:10000|mimes:doc,docx',
        ]);
    
        if ($validator->fails()){
            return response()->json([
                'status' => false,
                'message' => $validator->errors()->first(),
            ]);
        }

        $surat = Surat::findOrFail($id);
    
        $surat->update([
            'nama_surat' => $request->nama_surat,
            'desc' => $request->desc,
        ]);
    
        if ($request->hasFile('template')){
            // Upload New Template
            $template = $request->file('template');
            $templateName = $template->getClientOriginalName();
            $template->move(public_path('word-template'), $templateName);
    
            // Hapus File Template Lama
            if ($surat->template) {
                File::delete(public_path('word-template/') . $surat->template);
            }
    
            // Update Surat dengan Template Baru
            $surat->update([
                'template' => $templateName
            ]);
        }
    
        return response()->json([
            'status' => true,
            'message' => 'Surat Berhasil Diperbarui',
        ]);
    }

    public function destroy($id)
    {
        try {
            // Temukan surat berdasarkan ID yang diberikan
            $surat = Surat::findOrFail($id);
    
            // Hapus file template
            if ($surat->template) {
                File::delete(public_path('word-template/') . $surat->template);
            }
    
            // Hapus surat dari database
            $surat->delete();
    
            return response()->json([
                'status' => true,
                'message' => 'Surat Berhasil Dihapus'
            ]);
        } catch (Exception $e) {
            return response()->json([
                'status' => false,
                'message' => 'Gagal menghapus surat. Pesan kesalahan: ' . $e->getMessage()
            ], 500);
        }
    }
    
    
}
