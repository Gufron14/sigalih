<?php

namespace App\Livewire\Admin\Layanan\Pengajuan;

use App\Models\User;
use App\Models\Warga;
use Livewire\Component;
use App\Models\RequestSurat;
use App\Jobs\ConvertWordToPDF;
use Livewire\Attributes\Title;
use Livewire\Attributes\Layout;
use Illuminate\Support\Facades\Log;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Carbon;

#[Layout('livewire.admin.layouts.app')]
#[Title('Permohonan')]
class Show extends Component
{
    use InteractsWithQueue;

    public $jenisSurat;
    public $pengajuan;
    public $nomor_surat;
    public $tanggal_surat;
    public $catatan_admin;
    public $updateFormData = [];
    public $formData = [];

    protected $rules = [
        'nomor_surat' => 'required',
        'tanggal_surat' => 'required',
        'catatan_admin' => 'nullable',
    ];

    public function mount($id)
    {
        $this->pengajuan = RequestSurat::with('user', 'warga', 'jenisSurat')->findOrFail($id);

        $this->nomor_surat = $this->pengajuan->nomor_surat;
        $this->tanggal_surat = $this->pengajuan->tanggal_surat;
        $this->catatan_admin = $this->pengajuan->catatan_admin;
        $this->formData = json_decode($this->pengajuan->form_data, true);
        $this->updateFormData = $this->formData;

    }

    public function updateFormData()
    {
        $this->validate([
            'updateFormData.*' => 'required',
        ], [
            'updateFormData.*.required' => 'The :attribute field is required.',
        ]);
    
        try {
            $this->pengajuan->form_data = json_encode($this->updateFormData);
            $this->pengajuan->save();
            $this->pengajuan = $this->pengajuan->fresh();
            session()->flash('success', 'Form data updated successfully.');
        } catch (\Exception $e) {
            session()->flash('error', 'Failed to update form data: ' . $e->getMessage());
            Log::error('Form update error: ' . $e->getMessage());
        }
    }
    

    public function terimaPermohonan()
    {
        // try {
        // Ambil file template yang terkait dengan jenis surat
        $fileSurat = $this->pengajuan->jenisSurat->fileSurat;

        // Pastikan file template ditemukan
        if (!$fileSurat) {
            Log::error('Template surat tidak ada untuk pengajuan ID: ' . $this->pengajuan->id);
            session()->flash('error', 'Template surat tidak ada');
            return;
        }

        // Ambil jalur file template
        $filePath = storage_path('app/public/' . $fileSurat->file_path);

        if (!file_exists($filePath)) {
            Log::error('File template surat tidak ditemukan untuk pengajuan ID: ' . $this->pengajuan->id . ', Jalur: ' . $filePath);
            session()->flash('error', 'File template surat tidak ditemukan');
            return;
        }

        $this->validate();

        $this->pengajuan->update([
            'nomor_surat' => $this->nomor_surat,
            'tanggal_surat' => $this->tanggal_surat,
            'catatan_admin' => $this->catatan_admin,
            'status' => 'terima',
        ]);

        $user = User::with('warga')
            ->where('id', $this->pengajuan->user_id)
            ->firstOrFail();

        // if (!$user){
        //     $warga = Warga::where('id', $this->pengajuan->warga_id)
        //     ->firstOrFail();
        // }

        ConvertWordToPDF::dispatch($this->pengajuan, $user);

        session()->flash('success', 'Permohonan surat berhasil diterima.');
        return redirect()->route('pengajuan');
        // } catch (\Exception $e) {
        //     Log::error('Terjadi kesalahan saat memproses permohonan surat: ' . $e->getMessage());
        //     session()->flash('error', 'Terjadi kesalahan saat memproses permohonan surat. Silakan coba lagi nanti.');
        // }
    }

    public function tolakPermohonan()
    {
        $this->validate(['catatan_admin' => 'required|string']);

        $this->pengajuan->update([
            'catatan_admin' => $this->catatan_admin,
            'status' => 'tolak',
        ]);

        session()->flash('success', 'Permohonan surat berhasil ditolak.');
        return redirect()->route('pengajuan');
    }

    public function render()
    {
        return view('livewire.admin.layanan.pengajuan.show', [
            'pengajuan' => $this->pengajuan,
            'groupedPengajuan' => $this->groupedPengajuan ?? [],
        ]);
    }
}
