<?php

namespace App\Livewire\Admin\Transparansi;

use Livewire\Component;
use App\Models\Transparansi;
use Livewire\WithFileUploads;
use Livewire\Attributes\Title;
use Livewire\Attributes\Layout;

#[Title('Tambah Transparansi')]
#[Layout('livewire.admin.layouts.app')]
class Create extends Component
{   
    use WithFileUploads;
    public $keterangan;
    public $tahun;
    public $desc;
    public $dokumen;
    public $infografik;

    protected $rules = [
       'keterangan' => 'required', 
       'tahun' => 'required|numeric', 
       'desc' => 'nullable', 
       'dokumen' => 'required|mimes:pdf|max:1024', 
       'infografik' => 'required|mimes:png,jpg|max:2048', 
    ];
    public function store()
    {
        $this->validate();

        $dokumenName = $this->dokumen->getClientOriginalName();

        $docPath = $this->dokumen->storeAs('transparansi/dokumen' ,$dokumenName, 'public' );

        $infPath = $this->infografik->store('public/transparansi/infografik');

        Transparansi::create([
            'keterangan' => $this->keterangan,
            'tahun' => $this->tahun,
            'desc' => $this->desc,
            'dokumen' => $docPath,
            'infografik' => $infPath
        ]);

        $this->reset();
        session()->flash('success', 'Data Berhasil Ditambahkan.');
        return redirect()->back();
    }
    
    public function render()
    {
        return view('livewire.admin.transparansi.create');
    }
}
