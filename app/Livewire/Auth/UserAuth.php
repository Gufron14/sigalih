<?php

namespace App\Livewire\Auth;

use App\Models\User;
use App\Models\Warga;
use Livewire\Component;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use PHPOpenSourceSaver\JWTAuth\Facades\JWTAuth;

class UserAuth extends Component
{   
    public $nik, $email, $phone, $password;

    protected $rules = [
        'nik' => ['required', 'exists:wargas,nik', 'unique:users,nik'],
        'email' => ['required', 'email', 'unique:users,email'],
        'phone' => ['required', 'unique:users,phone'],
        'password' => ['required', 'min:8'],
    ];

    public function render()
    {
        return view('livewire.auth.user-auth');
    }

    public function register()
    {
        $this->validate();

        $warga = Warga::where('nik', $this->nik)->first();
        if (!$warga) {
            session()->flash('error', 'NIK tidak terdaftar');
            return;
        }

        $validator = Validator::make([
            'nik' => $this->nik,
            'email' => $this->email,
            'phone' => $this->phone,
            'password' => $this->password,
        ], $this->rules());

        if ($validator->fails()) {
            $this->addError('validation', $validator->messages()->toArray());
            return;
        }

        $user = User::create([
            'nik' => $warga->nik,
            'email' => $this->email,
            'phone' => $this->phone,
            'password' => Hash::make($this->password),
        ]);

        Auth::login($user, true);
        session()->flash('success', 'Registrasi Berhasil');
        return redirect()->to('login');
    }

    public function login()
    {
        $this->validate();

        $credentials = ['nik' => $this->nik, 'password' => $this->password];

        if (!$token = JWTAuth::attempt($credentials)) {
            session()->flash('error', 'NIK dan password tidak valid.');
            return redirect()->to('login');
        }

        session()->flash('message', 'Berhasil login.');
        session()->flash('token', $token);
        return redirect()->to('layanan');
    }
    
    public function logout()
    {
        auth()->logout();
        return redirect()->route('login');
    }
}
