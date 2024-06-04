<?php

namespace App\Livewire\BankSampah\Backend\Sampah;

use Livewire\Component;
use Livewire\Attributes\Title;
use Livewire\Attributes\Layout;
use App\Models\BankSampah\JenisSampah;

#[Layout('livewire.bank-sampah.backend.layout.bs-layout')]
#[Title('Jenis Sampah - Sampah Sigalih')]
class Index extends Component
{
    public $jenis_sampah;
    public $harga_per_kg;
    public $desc;
    public $jenisSampahId;

    public function mount($jenisSampahId = null)
    {
        if ($jenisSampahId) {
            $this->loadJenisSampah($jenisSampahId);
        }
    }

    public function loadJenisSampah($id)
    {
        $jenisSampah = JenisSampah::findOrFail($id);
        $this->jenisSampahId = $jenisSampah->id;
        $this->jenis_sampah = $jenisSampah->jenis_sampah;
        $this->harga_per_kg = $jenisSampah->harga_per_kg;
        $this->desc = $jenisSampah->desc;
    }

    public function store()
    {
        $this->validate([
            'jenis_sampah' => 'required',
            'harga_per_kg' => 'required|numeric',
            'desc' => 'nullable',
        ]);

        JenisSampah::create([
            'jenis_sampah' => $this->jenis_sampah,
            'harga_per_kg' => $this->harga_per_kg,
            'desc' => $this->desc
        ]);

        session()->flash('success', 'Jenis Sampah berhasil ditambahkan');
        $this->reset();
        return redirect()->to('bs-admin/sampah');
    }

    public function update()
    {
        $this->validate([
            'jenis_sampah' => 'max:100',
            'harga_per_kg' => 'numeric',
            'desc' => 'nullable|string',
        ]);

        $jenisSampah = JenisSampah::findOrFail($this->jenisSampahId);

        $jenisSampah->update([
            'jenis_sampah' => $this->jenis_sampah,
            'harga_per_kg' => $this->harga_per_kg,
            'desc' => $this->desc
        ]);

        $this->reset();
        $this->jenis_sampah = JenisSampah::all();

        session()->flash('success', 'Berhasil Update');
        $this->resetInputs();
        return redirect()->route('dashboard');
    }

    public function resetInputs()
    {
        $this->jenisSampahId = null;
        $this->jenis_sampah = '';
        $this->harga_per_kg = '';
        $this->desc = '';
    }

    public function render()
    {
        // $sampahs = JenisSampah::all();
        return view('livewire.bank-sampah.backend.sampah.index', [
            'jenis_sampahs' => JenisSampah::all(),
        ]);
    }
}
