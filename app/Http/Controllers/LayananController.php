<?php

namespace App\Http\Controllers;

use App\Models\JenisSurat;
use Illuminate\Http\Request;

class LayananController extends Controller
{
    public function index(){

        return view('layanan.index');
    }

    public function show(){

        $jenisSurat = JenisSurat::all();

        return view('layanan.index', compact('jenisSurat'));
    }
    

}
