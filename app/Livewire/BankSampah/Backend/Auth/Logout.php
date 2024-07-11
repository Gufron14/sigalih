<?php

namespace App\Livewire\BankSampah\Backend\Auth;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class Logout extends Component
{   

    public function logout()
    {
        Auth::guard('bs-admin')->logout();
        return redirect()->route('bs.login');
    }

    public function render()
    {
        return view('livewire.bank-sampah.backend.auth.logout');
    }
}
