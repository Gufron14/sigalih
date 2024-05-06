<?php

namespace App\Http\Controllers;

use App\Models\Surat;
use Illuminate\Http\Request;

class LayananController extends Controller
{
    public function index(){

        return view('layanan.index');
    }

    public function show(){

        $surats = Surat::all();

        // return response()->json([
        //     'surat' => $surat
        // ]);
        return view('layanan.index', compact('surats'));
    }
    

}
