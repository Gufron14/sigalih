<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Warga;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Tymon\JWTAuth\Facades\JWTAuth;

class UserController extends Controller
{
    /**
     * Create a new AuthController instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:api', ['except' => ['login', 'register', 'me', 'logout']]);
    }

    public function register(Request $request)
    {
        $rules = [
            'nik' => ['required', 'unique:users', 'exists:wargas,nik'], // Ubah validasi untuk menggunakan NIK
            'email' => ['required', 'email', 'unique:users'],
            'phone' => ['required', 'unique:users'],
            'password' => ['required', 'min:8'],
        ];
    
        $validate = Validator::make($request->all(), $rules);
        if ($validate->fails()) {
            return response()->json([
                'status' => false,
                'message' => $validate->messages()->first()
            ]);
        } else {
            // Retrieve Warga based on NIK
            $warga = Warga::where('nik', $request->nik)->first();
            if (!$warga) {
                return response()->json([
                    'status' => false,
                    'message' => 'NIK not found in Warga table'
                ]);
            }
    
            // Create a new user with the proper 'nik'
            $user = new User([
                'nik' => $warga->nik, // Menggunakan NIK dari tabel Warga
                'email' => $request->email,
                'phone' => $request->phone,
                'password' => Hash::make($request->password),
            ]);
    
            // Save the user
            $user->save();
    
            return response()->json([
                'status' => true,
                'message' => 'successfully registered',
                'user' => $user
            ]);
        }
    }

    /**
     * Get a JWT via given credentials.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function login(Request $request)
    {
        $credentials = request(['nik', 'password']);

        if (!$token = Auth::guard('user')->attempt($credentials)) {
            return response()->json([
                'status' => false,
                'message' => 'email and password is invalid'
            ]);
        }
        $user = User::where('nik', $request->nik)->first();
        $user->remember_token = $token;
        $user->save();
        return response()->json([
            'status' => true,
            'message' => 'successfully login',
            'token' => $user->remember_token,
            'user' => $user
        ], 200);
    }

    /**
     * Get the authenticated User.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function me(Request $request)
    {  
        if (auth()->check()) {
            $user = auth()->user(); // Mengambil informasi pengguna yang sedang login
            return response()->json([
                'status' => true,
                'message' => 'Show current user',
                'user' => $user
            ]);
        } else {
            return response()->json([
                'status' => false,
                'message' => 'User not logged in'
            ]);
        }
    }

    /**
     * Log the user out (Invalidate the token).
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function logout(Request $request)
    {

        $token = JWTAuth::getToken();
        JWTAuth::invalidate($token);

        return response()->json([
            'status' => true,
            'message' => 'Successfully logged out'
        ], 200);

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
