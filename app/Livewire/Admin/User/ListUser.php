<?php

namespace App\Livewire\Admin\User;

use App\Models\User;
use Livewire\Component;
use Livewire\Attributes\Title;
use Livewire\Attributes\Layout;

#[Title('User')]
#[Layout('livewire.admin.layouts.app')]
class ListUser extends Component
{
    public function render()
    {   
        $users = User::all();
        return view('livewire.admin.user.list-user', compact('users'));
    }
}
