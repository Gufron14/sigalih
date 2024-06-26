<?php

namespace App\Livewire\Pembangunan;

use Livewire\Component;
use App\Models\Transparansi;
use Illuminate\Support\Facades\Storage;

class DanaDesa extends Component
{   

    public function render()
    {   
        $transparansis = Transparansi::all();
        return view('livewire.pembangunan.dana-desa', compact('transparansis'));
    }
}
