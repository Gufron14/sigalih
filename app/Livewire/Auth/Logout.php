<?php

namespace App\Livewire\Auth;

use App\Models\User;
use Livewire\Component;

class Logout extends Component
{
    public function logout() 
    {
        $user = User::where('nik', auth('user')->user()->nik)->first();
        $user->token = null;
        $user->save();
        auth('user')->logout();
        // return response()->json([
        //     'status' => true,
        //     'message' => 'Successfully logged out'
        // ]);
        session()->flash('success', 'Successfully logged out.');

        return redirect()->to('/');
    }
}
