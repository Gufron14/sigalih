<?php

namespace App\Livewire\Admin\Layanan\JenisSurat;

use Livewire\Component;
use App\Models\JenisSurat;
use Livewire\Attributes\Title;
use Livewire\Attributes\Layout;
use Illuminate\Support\Facades\Storage;

#[Layout('livewire.admin.layouts.app')]
#[Title('Daftar Surat')]
class Index extends Component
{

    public function destroy($id)
    {
        $jenisSurat = JenisSurat::findOrFail($id);

        // Hapus file surat dari folder storage
        if ($jenisSurat->fileSurat) {
            Storage::disk('public')->delete($jenisSurat->fileSurat->file_path);
            $jenisSurat->fileSurat()->delete();
        }

        // Hapus form_fields di database
        $jenisSurat->formFields()->delete();

        $jenisSurat->delete();

        session()->flash('success', 'Berhasil dihapus');

        return redirect()->back();
    }

    public function render()
    {   
        $jenisSurats = JenisSurat::all();
        return view('livewire.admin.layanan.jenis-surat.index', compact('jenisSurats'));
    }
}
