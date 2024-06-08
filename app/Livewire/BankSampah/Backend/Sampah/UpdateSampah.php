<?php

namespace App\Livewire\BankSampah\Backend\Sampah;

use Livewire\Component;
use Livewire\Attributes\Title;
use Livewire\Attributes\Layout;
use App\Models\BankSampah\JenisSampah;

#[Layout('livewire.bank-sampah.backend.layout.bs-layout')]
#[Title('Jenis Sampah - Sampah Sigalih')]
class UpdateSampah extends Component
{   
    public $jenis_sampah;
    public $harga_per_kg;
    public $desc;
    public $jenisSampahId;

    protected $rules = [
        'jenis_sampah' => 'max:100',
        'harga_per_kg' => 'numeric',
        'desc' => 'nullable|string',
    ];

    public function mount($id)
    {
        $jenisSampah = JenisSampah::findOrFail($id);

        $this->jenisSampahId = $jenisSampah->id;
        $this->jenis_sampah = $jenisSampah->jenis_sampah;
        $this->harga_per_kg = $jenisSampah->harga_per_kg;
        $this->desc = $jenisSampah->desc;
    }

    public function update()
    {
        $validatedData = $this->validate([
            'jenis_sampah' => 'max:100',
            'harga_per_kg' => 'numeric',
            'desc' => 'nullable|string',
        ]);

        try {
            // Temukan jenis sampah berdasarkan ID
            $jenisSampah = JenisSampah::findOrFail($this->jenisSampahId);
    
            // Update data jenis sampah
            $jenisSampah->update($validatedData);
    
            // Reset form atau state setelah berhasil update
            $this->reset();
    
            // Set pesan sukses
            session()->flash('success', 'Berhasil Update');
        } catch (\Exception $e) {
            // Set pesan error jika terjadi kesalahan
            session()->flash('error', 'Gagal Update: ' . $e->getMessage());
        }

        return redirect()->to('bs-admin/sampah');

    }
    public function render()
    {
        return view('livewire.bank-sampah.backend.sampah.update-sampah', [
            'sampah' => JenisSampah::findOrFail($this->jenisSampahId),
        ]);
    }
}
