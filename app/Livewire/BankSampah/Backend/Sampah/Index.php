<?php

namespace App\Livewire\BankSampah\Backend\Sampah;

use Livewire\Component;
use Livewire\Attributes\Title;
use Livewire\Attributes\Layout;
use App\Models\BankSampah\JenisSampah;
use Masmerise\Toaster\Toaster;

#[Layout('livewire.bank-sampah.backend.layout.bs-layout')]
#[Title(' Sampah - Sampah Sigalih')]
class Index extends Component
{
    public $jenis_sampah;
    public $harga_per_kg;
    public $desc;
    public $jenisSampahId;

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

        $this->reset();
        Toaster::success('Berhasil menambahkan jenis sampah baru');
        return redirect()->to('bs-admin/sampah');
    }


    public function destroy($id)
    {
        JenisSampah::destroy($id);
        session()->flash('success', 'Jenis Sampah berhasil dihapus');
        return redirect()->to('bs-admin/sampah');
    }

    public function render()
    {
        return view('livewire.bank-sampah.backend.sampah.index', [
            'jenis_sampahs' => JenisSampah::all(),
        ]);
    }
}
