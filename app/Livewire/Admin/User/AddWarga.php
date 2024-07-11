<?php

namespace App\Livewire\Admin\User;

use App\Models\Warga;
use Livewire\Component;
use Livewire\Attributes\Title;
use Livewire\Attributes\Layout;

#[Title('Tambah Warga')]
#[Layout('livewire.admin.layouts.app')]
class AddWarga extends Component
{
    public $nik, $nama, $ttl, $jk, $alamat, $rt, $rw, $desa, $kec, $kab, $status, $pekerjaan, $agama;

    public $defaultDesa, $defaultKec, $defaultKab;

    protected $rules = [
        'nik' => 'required|unique:wargas,nik|min:16|max:16',
        'nama' => 'required|min:3|max:30',
        'jk' => 'required',
        'ttl' => 'required',
        'alamat' => 'required|min:3|max:100',
        'rt' => 'required|min:3|max:3',
        'rw' => 'required|min:2|max:3',
        'desa' => 'nullable',
        'kec' => 'nullable',
        'kab' => 'nullable',
        'agama' => 'required',
        'status' => 'required',
        'pekerjaan' => 'required',
    ];

    public function mount()
    {
        $this->defaultDesa = "Sirnagalih";
        $this->defaultKec = "Cisurupan";
        $this->defaultKab = "Garut";
    }

    public function store()
    {
        $validator = $this->validate();

        if (!$validator) {
            session()->flash('error', 'Data gagal ditambahkan.');
            return redirect()->route('warga');
        }

        Warga::create([
            'nik' => $this->nik,
            'nama' => $this->nama,
            'ttl' => $this->ttl,
            'jk' => $this->jk,
            'alamat' => $this->alamat,
            'rt' => $this->rt,
            'rw' => $this->rw,
            'desa' => $this->desa,
            'kec' => $this->kec,
            'kab' => $this->kab,
            'agama' => $this->agama,
            'status' => $this->status,
            'pekerjaan' => $this->pekerjaan,
        ]);
        session()->flash('success', 'Data berhasil ditambahkan.');
        return redirect()->route('warga');
    }

    public function render()
    {
        return view('livewire.admin.user.add-warga');
    }
}
