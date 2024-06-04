<?php

namespace App\Livewire\Auth;

use Livewire\Component;
use Livewire\Attributes\Title;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Session;

#[Title('Autentikasi - Desa Sirnagalih')]

class UserAuth extends Component
{   

    public $nik, $password, $email, $phone;
    public $errorMessage;

    protected $rules = [
        'nik' => 'required|string',
        'password' => 'required|string',
    ];

    public function register()
    {
        
        $response = Http::post('http://127.0.0.1:8000/api/register', [
            'nik' => $this->nik,
            'email' => $this->email,
            'phone' => $this->phone,
            'password' => $this->password,
        ]);

        if ($response->successful()) {
            session()->flash('success', 'Registrasi berhasil. Silakan login.');
            return redirect()->to('/login');
        } else {
            $errors = $response->json('message');
            session()->flash('error', 'Registrasi gagal: ' . $errors);
        }
    }

    public function login()
    {   
        $this->validate();

        $response = Http::post('http://localhost:8000/api/login', [
            'nik' => $this->nik,
            'password' => $this->password,
        ]);

        if ($response->successful() && isset($response['token'])) {
            session(['token' => $response['token']]);
            session()->flash('success', 'Berhasil Login');
            return redirect()->route('home');
        } else {
            session()->flash('error', 'NIK atau Password salah');
            return redirect()->back();
        }
    }

    public function logout()
    {
        Auth::logout();
        session()->invalidate();
        session()->regenerateToken();
        return redirect('/');
    }

    public function render()
    {
        return view('livewire.auth.user-auth');
    }
}
