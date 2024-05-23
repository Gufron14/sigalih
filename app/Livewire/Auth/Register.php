<?php

namespace App\Livewire\Auth;

use App\Models\User;
use App\Models\Warga;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Request;

class Register extends Component
{   
    public $nik, $email, $phone, $password;

    public function render()
    {
        return view('livewire.auth.register');
    }

    public function rules()
    {
        return [
            'nik' => ['required', 'unique:users', 'exists:wargas,nik'],
            'email' => ['required', 'email', 'unique:users'],
            'phone' => ['required', 'unique:users'],
            'password' => ['required', 'min:8'],
        ];
    }

    public function register()
    {
        $this->validate();

        $warga = Warga::where('nik', $this->nik)->first();
        if (!$warga) {
            return response()->json([
                'status' => false,
                'message' => 'NIK tidak terdaftar',
            ]);
        }

        $user = User::create([
            'nik' => $warga->nik,
            'email' => $this->email,
            'phone' => $this->password,
            'password' => Hash::make(request('password')),
        ]);

        Auth::login($user, true);

        session()->flash('success', 'berhasil');

        return redirect()->to('login');
    }
}
