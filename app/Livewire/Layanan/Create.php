<?php

namespace App\Livewire\Layanan;

use Livewire\Component;
use App\Models\Surat;
use App\Models\User;
use App\Models\Pengajuan;

class Create extends Component
{
    public $surat;
    public $nik;
    public $id_surat;

    public $disabled = false;

    protected $rules = [
        'nik' => 'required|exists:users,nik',
        'id_surat' => 'required|exists:surats,id',
    ];

    public function mount($id)
    {
        $this->surat = Surat::findOrFail($id);
        $this->id_surat = $id;
    }

    public function store()
    {
        $this->validate();

        // Cek apakah pengguna telah melakukan pengajuan sebelumnya
        $existingPengajuan = Pengajuan::where('nik', $this->nik)
            ->where('id_surat', $this->id_surat)
            ->exists();

        // Jika pengguna sudah melakukan pengajuan sebelumnya, non-aktifkan tombol
        if ($existingPengajuan) {
            $this->disabled = true;
            session()->flash('error', 'Anda sudah melakukan pengajuan sebelumnya.');
            return;
        }

        $user = User::where('nik', $this->nik)->firstOrFail();

        Pengajuan::create([
            'nik' => $user->nik,
            'id_surat' => $this->id_surat,
            'status' => 'tunggu',
        ]);

        session()->flash('message', 'Permohonan berhasil dibuat.');
        return redirect()->back();
    }

    public function render()
    {
        return view('livewire.layanan.create', [
            'surat' => $this->surat,
        ]);
    }
}
