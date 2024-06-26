<?php

namespace App\Livewire\Admin\Transparansi;

use Livewire\Component;
use Livewire\Attributes\Title;
use Livewire\Attributes\Layout;

#[Title('Transparansi')]
#[Layout('livewire.admin.layouts.app')]

class Index extends Component
{   
    public function render()
    {   
        $transparansis = \App\Models\Transparansi::all();
        return view('livewire.admin.transparansi.index', compact('transparansis'));
    }
}
