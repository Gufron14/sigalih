<?php

namespace App\Http\Controllers;

use App\Models\Surat;
use Illuminate\Http\Request;

class ViewController extends Controller
{
    public function index(){

        $surats = Surat::latest()->take('3')->get();

        return view('welcome', compact('surats'));
    }

    public function viewLogin()
    {
        return view('auth.login');
        // return response()->json([
        //     'message' => 'Halaman Login'
        // ]);
    }

    public function viewRegister(){
        return view('auth.register');
    }
}
