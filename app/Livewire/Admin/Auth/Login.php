<?php

namespace App\Livewire\Admin\Auth;

use Livewire\Component;
use Livewire\Attributes\Title;
use Illuminate\Support\Facades\Auth;

#[Title('Login Admin Sirnagalih')]

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

        if (Auth::guard('admin')->attempt($credentials)) {
            return redirect()->intended('/admin/dashboard');
        } else {
            session()->flash('error', 'Invalid Username or Password');
        }
    }

    public function render()
    {
        return view('livewire.admin.auth.login');
    }
}
