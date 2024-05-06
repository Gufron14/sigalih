<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Warga;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class UserAuthController extends Controller
{
        /**
     * Create a new AuthController instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:api', ['except' => ['login', 'register']]);
    }

    public function registerPage()
    {
        return view('auth.register');
    }
    public function loginPage()
    {
        return view('auth.login');
    }

    public function register(Request $request)
    {
        $warga = Warga::where('nik', $request->nik)->first();
        if (!$warga) {
            // return response()->json([
            //     'status' => false,
            //     'message' => 'NIK tidak terdaftar',
            // ]);
            return view('auth.register')->with(['error' => 'NIK tidak terdaftar']);
        }

        $validator = Validator::make($request->all(), [
            'nik' => ['required', 'unique:users', 'exists:wargas,nik'],
            'email' => ['required', 'email', 'unique:users'],
            'phone' => ['required', 'unique:users'],
            'password' => ['required', 'min:8'],
        ]);

        if ($validator->fails()) {
            // return response()->json([
            //     'status' => false,
            //     'message' => $validator->messages(),
            // ]);
            return view('auth.register');
        }

        $user = User::create([
            'nik' => $warga->nik,
            'email' => request('email'),
            'phone' => request('phone'),
            'password' => Hash::make(request('password')),
        ]);

        if ($user) {
            // return response()->json(['message' => 'Registrasi Berhasil']);
            return view('auth.login');
        } else {
            // return response()->json(['message' => 'Registrasi Gagal']);
            return view('auth.register')->with('error', 'Gagal');
        }
    }

    /**
     * Get a JWT via given credentials.P
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function login(Request $request)
    {
        $credentials = request(['nik', 'password']);

        if (! $token = auth()->attempt($credentials)) {
            return response()->json(['error' => 'Unauthorized'], 401);
            // return redirect()->route('auth/login');
        }
        $user = User::where('nik', $request->nik)->first();
        $user->remember_token = $token;
        $user->save();

        // return response()->json([
        //     'status' => true,
        //     'message' => 'successfully login',
        //     'token' => $token,
        //     'user' => $user,
        //     'redirect' => route('layanan') // Tambahkan ini
        // ], 200);
            
        return $this->respondWithToken($token);
        // return redirect()->route('layanan')->with('success', 'Berhasil login');   
    }

    /**
     * Get the authenticated User.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function me()
    {   
        return response()->json(auth()->user());
    }

    /**
     * Log the user out (Invalidate the token).
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function logout()
    {
        auth('user')->logout();

        return response()->json(['message' => 'Successfully logged out']);
        // return redirect('/');
    }

    /**
     * Refresh a token.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function refresh()
    {
        return $this->respondWithToken(auth()->refresh());
    }

    /**
     * Get the token array structure.
     *
     * @param  string $token
     *
     * @return \Illuminate\Http\JsonResponse
     */
    protected function respondWithToken($token)
    {
        return response()->json([
            'access_token' => $token,
            'token_type' => 'bearer',
            'expires_in' => auth()->factory()->getTTL() * 60
        ]);
    }
}
