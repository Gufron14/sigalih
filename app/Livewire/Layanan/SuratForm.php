<?php

namespace App\Livewire\Layanan;

use Livewire\Component;
use App\Models\FormField;
use App\Models\JenisSurat;
use App\Models\RequestSurat;
use Illuminate\Support\Facades\Auth;

class SuratForm extends Component
{   
    public $JenisSurat;
    public $selectedJenisSurat = null;
    public $formFields = [];
    public $formData = [];

    public function mount()
    {
        // Ambil semua jenis surat
        $this->JenisSurat = JenisSurat::all();
    }

    public function updatedSelectedJenisSurat($value)
    {
        // Reset data formulir ketika jenis surat berubah
        $this->formData = [];
        // Ambil kolom-kolom formulir berdasarkan jenis surat yang dipilih
        $this->formFields = FormField::where('jenis_surat_id', $value)->get();
    }

    public function submit()
    {
        // Validasi data formulir
        $this->validate();

        // Simpan pengajuan surat ke database
        $requestSurat = RequestSurat::create([
            'user_id' => Auth::id(),
            'jenis_surat_id' => $this->selectedJenisSurat,
            'request_data' => json_encode($this->formData),
            'status' => 'pending',
        ]);

        // Tampilkan pesan sukses
        session()->flash('message', 'Pengajuan surat berhasil dikirim.');

        // Reset formulir setelah pengajuan berhasil
        $this->resetForm();
    }

    private function resetForm()
    {
        $this->selectedJenisSurat = null;
        $this->formFields = [];
        $this->formData = [];
    }
    public function render()
    {
        return view('livewire.layanan.surat-form');
    }
}
