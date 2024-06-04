<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Warga;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use PHPOpenSourceSaver\JWTAuth\Facades\JWTAuth;
use PHPOpenSourceSaver\JWTAuth\Exceptions\JWTException;

class UserAuthController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:api', ['except' => ['login', 'register']]);
    }

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
        $credentials = $request->only('nik', 'password');

        try {
            if (!$token = JWTAuth::attempt($credentials)) {
                return response()->json(['error' => 'invalid_credentials'], 400);
            }
            $user = Auth::user();
            $user->remember_token = $token;
            $user->save();
        } catch (JWTException $e) {
            return response()->json(['error' => 'could_not_create_token'], 500);
        }

        return $this->respondWithToken($token);
    }

    public function me()
    {
        return response()->json(auth()->user());
    }
    

    public function logout()
    {
        auth('user')->logout();

        return response()->json(['message' => 'Berhasil Logout']);
    }

    public function refresh()
    {
        return $this->respondWithToken(auth()->refresh());
    }

    protected function respondWithToken($token)
    {
        return response()->json([
            'access_token' => $token,
            'token_type' => 'bearer',
            'expires_in' => auth()->factory()->getTTL() * 0.5,
        ]);
    }
}
