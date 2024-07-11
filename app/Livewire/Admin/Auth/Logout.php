<?php

namespace App\Livewire\Admin\Auth;

use Livewire\Component;
use Livewire\Attributes\Title;
use Livewire\Attributes\Layout;
use Illuminate\Support\Facades\Auth;

#[Title('Logout Admin')]
#[Layout('livewire.admin.layouts.app')]
class Logout extends Component
{   
    public function logout()
    {
        Auth::guard('admin')->logout();
        session()->flash('success', 'Berhasil Logout');
        return redirect()->route('admin.login');
    }

    public function render()
    {
        return view('livewire.admin.auth.logout');
    }
}
