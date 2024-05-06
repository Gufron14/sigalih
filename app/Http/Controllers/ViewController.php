<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ViewController extends Controller
{
    public function index(){
        return view('welcome');
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
