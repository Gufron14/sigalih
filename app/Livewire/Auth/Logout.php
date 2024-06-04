<?php

namespace App\Livewire\Auth;

use App\Models\User;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class Logout extends Component
{
    public function logout()
    {
        Auth::logout();

        session()->flash('success', 'Berhasil Logout');
        return redirect('/');
    }

    public function render()
    {
        return view('livewire.auth.logout');
    }
}
