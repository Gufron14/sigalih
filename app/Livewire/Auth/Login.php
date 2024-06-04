<?php

namespace App\Livewire\Auth;

use Livewire\Component;
use Livewire\Attributes\Title;
use Illuminate\Support\Facades\Auth;

#[Title('Login - Desa Sirnagalih')]
class Login extends Component
{
    public $nik, $password, $user;

    protected $rules = [
        'nik' => 'required|exists:users,nik',
        'password' => 'required',
    ];

    public function login()
    {
        $this->validate();

        if (Auth::attempt(['nik' => $this->nik, 'password' => $this->password])) {

            $user = Auth::user();
            $token = $user->createToken('auth_token', ['*'], now()->addSeconds(30))->plainTextToken;

            session()->flash('success', 'Berhasil Login');
            return redirect()->route('home');
        } else {
            session()->flash('error', 'NIK atau Password Salah');

            return redirect()->back();
        }
    }

    public function logout()
    {
        Auth::logout();

        return redirect('login');
    }

    public function render()
    {
        return view('livewire.auth.login');
    }
}
