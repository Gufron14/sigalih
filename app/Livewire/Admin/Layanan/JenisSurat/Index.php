<?php

namespace App\Livewire\Admin\Layanan\JenisSurat;

use App\Models\JenisSurat;
use Livewire\Component;
use Livewire\Attributes\Title;
use Livewire\Attributes\Layout;

#[Layout('livewire.admin.layouts.app')]
#[Title('Daftar Surat')]
class Index extends Component
{   
    public $jenisSurat;

    public function mount()
    {
        $this->jenisSurat = JenisSurat::all();
    }

    public function destroy($id)
    {
        $jenisSurat = JenisSurat::findOrFail($id);

        $jenisSurat->delete();

        session()->flash('success', 'Berhasil dihapus');

        return redirect()->back();
    }

    public function render()
    {
        return view('livewire.admin.layanan.jenis-surat.index', [
            'jenisSurat' => $this->jenisSurat,
        ]);
    }
}
