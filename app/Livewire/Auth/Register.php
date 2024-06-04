<?php

namespace App\Livewire\Auth;

use App\Models\User;
use App\Models\Warga;
use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\Attributes\Title;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Request;


#[Title('Register - Desa Sirnagalih')]
class Register extends Component
{   
    use WithFileUploads;

    public $nik, $email, $phone, $password, $password_confirmation, $avatar;

    protected $rules = [
        'nik' => 'required|unique:users,nik|exists:wargas,nik',
        'email' => 'required|email|unique:users,email',
        'phone' => 'required|unique:users,phone',
        'password' => 'required|min:6',
    ];

    public function register()
    {
        
        $this->validate();

        $warga = Warga::where('nik', $this->nik)->first();
        if (!$warga) {
            session()->flash('error', 'NIK tidak Terdaftar, hubungi Administrator jika ini Kesalahan.');
            return redirect()->back();
        }

        $user = User::create([
            'nik' => $this->nik,
            'email' => $this->email,
            'phone' => $this->phone,
            'password' => Hash::make($this->password),
        ]);

        // auth()->login($user);

        session()->flash('success', 'Pendaftaran Akun Berhasil');

        return redirect()->route('login');
    }

    public function render()
    {
        return view('livewire.auth.register');
    }
}
