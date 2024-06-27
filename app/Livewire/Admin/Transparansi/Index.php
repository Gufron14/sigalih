<?php

namespace App\Livewire\Admin\Transparansi;

use Livewire\Component;
use Livewire\Attributes\Title;
use Livewire\Attributes\Layout;
use Illuminate\Support\Facades\Storage;

#[Title('Transparansi')]
#[Layout('livewire.admin.layouts.app')]

class Index extends Component
{   

    public function destroy($id)
    {
        $transparansi = \App\Models\Transparansi::findOrFail($id);

        if ($transparansi->file_path) {
            Storage::disk('public')->delete($transparansi->file_path);
        }

        $transparansi->delete();
        \App\Models\Transparansi::all();
        session()->flash('success', 'Berhasil dihapus');
        return redirect()->back();
    }
    public function render()
    {   
        $transparansis = \App\Models\Transparansi::all();
        return view('livewire.admin.transparansi.index', compact('transparansis'));
    }
}
