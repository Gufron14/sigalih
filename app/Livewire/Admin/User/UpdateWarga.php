<?php

namespace App\Livewire\Admin\User;

use App\Models\Warga;
use Livewire\Component;
use Livewire\Attributes\Title;
use Livewire\Attributes\Layout;

#[Title('Edit Warga')]
#[Layout('livewire.admin.layouts.app')]
class UpdateWarga extends Component
{   

    public $warga;
    public $nik, $nama, $ttl, $jk, $alamat, $rt, $rw, $desa, $kec, $kab, $status, $pekerjaan, $agama;

    protected $rules = [
        'nik' => 'min:16|max:16',
        'nama' => 'min:3|max:30',
        'jk' => 'nullable',
        'ttl' => 'nullable',
        'alamat' => 'nullable|min:3|max:100',
        'rt' => 'nullable|min:2|max:3',
        'rw' => 'nullable|min:2|max:3',
        'desa' => 'nullable',
        'kec' => 'nullable',
        'kab' => 'nullable',
        'agama' => 'nullable',
       'status' => 'nullable',
        'pekerjaan' => 'nullable',
    ];

    public function mount($id)
    {
        $this->warga = Warga::findOrFail($id);
        
        $this->nik = $this->warga->nik;
        $this->nama = $this->warga->nama;
        $this->ttl = $this->warga->ttl;
        $this->jk = $this->warga->jk;
        $this->alamat = $this->warga->alamat;
        $this->rt = $this->warga->rt;
        $this->rw = $this->warga->rw;
        $this->desa = $this->warga->desa;
        $this->kec = $this->warga->kec;
        $this->kab = $this->warga->kab;
        $this->status = $this->warga->status;
        $this->pekerjaan = $this->warga->pekerjaan;
        $this->agama = $this->warga->agama;
    }

    public function update()
    {
        $validator = $this->validate();
        $this->warga->update($validator);
        session()->flash('success', 'Data berhasil diubah.');
        return redirect()->route('warga');
    }


    public function render()
    {
        return view('livewire.admin.user.update-warga');
    }
}
