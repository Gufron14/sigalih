<?php

namespace App\Livewire\BankSampah\Backend\Auth;

use Livewire\Component;

use Livewire\Attributes\Title;
use Livewire\Attributes\Layout;
use Illuminate\Support\Facades\Auth;

#[Title('Login Admin Bank Sampah')]
class Login extends Component
{
    public $username, $password, $admin, $remember;

    protected $rules = [
        'username' =>'required',
        'password' => 'required',
    ];

    public function login()
    {
        $credentials = ['username' => $this->username, 'password' => $this->password];

        if (Auth::guard('bs-admin')->attempt($credentials)) {
            return redirect()->intended('/bs-admin/dashboard');
        } else {
            session()->flash('error', 'Invalid Username or Password');
        }
    }
    
    public function render()
    {
        return view('livewire.bank-sampah.backend.auth.login');
    }
}
