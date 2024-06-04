<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Warga;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AuthSanctumController extends Controller
{
    public function register(Request $request)
    {
        $warga = Warga::where('nik', $request->nik)->first();
        if (!$warga) {
            return response()->json([
                'status' => false,
                'message' => 'NIK tidak terdaftar',
            ]);
        }

        $validator = Validator::make($request->all(), [
            'nik' => ['required', 'unique:users', 'exists:wargas,nik'],
            'email' => ['required', 'email', 'unique:users'],
            'phone' => ['required', 'unique:users'],
            'password' => ['required', 'min:8'],
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => false,
                'message' => $validator->messages(),
            ]);
        }

        $user = User::create([
            'nik' => $warga->nik,
            'email' => request('email'),
            'phone' => request('phone'),
            'password' => Hash::make(request('password')),
        ]);

        if ($user) {
            return response()->json(['message' => 'Registrasi Berhasil']);
        } else {
            return response()->json(['message' => 'Registrasi Gagal']);
        }
    }

    public function login(Request $request)
    {

        $request->validate([
            'nik' => 'required',
            'password' => 'required',
        ]);
        
        $user = User::where('nik', $request->nik)->first();
        if (!Auth::attempt($request->only('nik', 'password'))) {
            return response()->json(['message' => 'Invalid credentials'], 401);
        }

        $user = Auth::user();
        $token = $user->createToken('auth_token')->plainTextToken;

        return response()->json(['access_token' => $token, 'token_type' => 'Bearer']);
    }
    public function logout(Request $request)
    {
        if ($request->user()) {
            $request->user()->tokens()->delete(); // Mencabut semua token pengguna
        }
    
        return response()->json(['message' => 'Logged out successfully']);
    }
    
}
