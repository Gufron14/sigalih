<?php

namespace App\Http\Controllers;

use App\Models\Pengajuan;
use App\Models\Surat;
use App\Models\user;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class LayananController extends Controller
{
    public function index()
    {
        $surats = Surat::all();
        return view('layanan.index', compact('surats'));
    }
    
    public function create($id)
    {   
        $surat = Surat::findOrFail($id);
        return view('layanan.create-surat', compact('surat'));
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nik' => 'required|exists:users,nik',
            'id_surat' => 'required|exists:surats,id',
        ]);
    
        if ($validator->fails()) {
            return response()->json([
                'status' => false,
                'message' => $validator->messages()
            ]);
        }
    
        $surat = Surat::findOrFail($request->id_surat);
        $user = User::where('nik', $request->nik)->firstOrFail();
    
        $pengajuan = Pengajuan::create([
            'nik' => $user->nik,
            'id_surat' => $surat->id,
            'status' => 'tunggu'
        ]);
    
        return view('layanan.progres');
    }

    public function progres($id)
    {
        $pengajuan = Pengajuan::findOrFail($id);
        return view('layanan.progres', compact('pengajuan'));
    }

}
