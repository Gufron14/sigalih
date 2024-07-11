<?php

namespace App\Livewire\Admin\Transparansi;

use Livewire\Component;

use App\Models\Transparansi;
use Livewire\WithFileUploads;
use Livewire\Attributes\Title;
use Livewire\Attributes\Layout;
use Illuminate\Support\Facades\Storage;

#[Title('Update Transparansi')]
#[Layout('livewire.admin.layouts.app')]

class Update extends Component
{   
    use WithFileUploads;
    public $id, $keterangan, $tahun, $desc, $dokumen, $infografik;


    public function mount($id)
    {
        $transparansi = Transparansi::findOrFail($id);

        if($transparansi) {
            $this->id = $transparansi->id;
            $this->keterangan = $transparansi->keterangan;
            $this->tahun = $transparansi->tahun;
            $this->desc = $transparansi->desc;
            $this->dokumen = $transparansi->dokumen;
            $this->infografik = $transparansi->infografik;
        }
    }

    public function update()
    {
        $this->validate([
            'keterangan' => 'max:100',
            'tahun' => 'max:4',
            'desc' => 'nullable',
        ]);

        $transparansi = Transparansi::findOrFail($this->id);

        if($this->dokumen instanceof \Illuminate\Http\UploadedFile) {
            if($transparansi->dokumen) {
                Storage::delete($transparansi->dokumen);
            }

            $dokumenName = $this->dokumen->getClientOriginalName();
            $docPath = $this->dokumen->storeAs('transparansi/dokumen' ,$dokumenName, 'public' );
            $transparansi->dokumen = $docPath;
            $transparansi->save();
        } else {
            $transparansi->dokumen = $this->dokumen;
        }

        if($this->infografik instanceof \Illuminate\Http\UploadedFile) {
            if($transparansi->infografik) {
                Storage::delete($transparansi->infografik);
            }

            $infografikPath = $this->infografik->store('public/transparansi/infografik');
            $transparansi->infografik = $infografikPath;
            $transparansi->save();
        } else {
            $transparansi->infografik = $this->infografik;
        }

        $transparansi->keterangan = $this->keterangan;
        $transparansi->tahun = $this->tahun;
        $transparansi->desc = $this->desc;
        $transparansi->save();

        $this->reset();
        session()->flash('success', 'Transparansi Berhasil Update');

        return redirect()->to('admin/transparansi');
    }

    public function render()
    {
        $transparansi = Transparansi::findOrFail($this->id);
        return view('livewire.admin.transparansi.update', compact('transparansi'));
    }
}
