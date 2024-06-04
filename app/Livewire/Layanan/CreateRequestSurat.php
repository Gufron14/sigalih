<?php

namespace App\Livewire\Layanan;

use App\Models\User;
use Livewire\Component;
use App\Models\JenisSurat;
use App\Models\RequestSurat;
use Livewire\WithFileUploads;
use Livewire\Attributes\Title;

#[Title('Buat Permohonan')]
class CreateRequestSurat extends Component
{
    use WithFileUploads;

    public $jenisSurat;
    public $selectedLetterId;
    public $formData = [];
    public $rules = [];

    public function mount($nama_surat)
    {
        $jenisSurat = JenisSurat::where('nama_surat', $nama_surat)->firstOrFail();
        $this->selectedLetterId = $jenisSurat->id;
        $this->loadFormFields();
    }

    public function submit()
    {
        $this->validate();

        $jenisSurat = JenisSurat::find($this->selectedLetterId);
        $existingRequest = RequestSurat::where('user_id', auth()->id())
            ->where('jenis_surat_id', $this->selectedLetterId)
            ->where('approved', true)
            ->where('expired_at', '>', now())
            ->first();

        if ($existingRequest) {
            $this->dispatchBrowserEvent('letter-submission-failed', ['message' => 'Anda tidak dapat mengajukan surat ini saat ini karena masih dalam tenggat waktu.']);
            return;
        }

        $surat = RequestSurat::create([
            'jenis_surat_id' => $this->selectedLetterId,
            'user_id' => auth()->id(),
            'form_data' => $this->formData,
        ]);

        $this->dispatchBrowserEvent('letter-submitted', ['message' => 'Surat ' . $jenisSurat->nama_surat . ' berhasil diajukan.']);
    }

    protected function loadFormFields()
    {
        $jenisSurat = JenisSurat::with('formFields')->find($this->selectedLetterId);
    
        // Tambahkan baris berikut untuk debugging
        if ($jenisSurat->formFields->isEmpty()) {
            $this->dispatchBrowserEvent('error', ['message' => 'Tidak ada field yang ditemukan untuk jenis surat ini.']);
            return;
        }
    
        $this->rules = [];
        $this->formData = [];
    
        foreach ($jenisSurat->formFields as $field) {
            $fieldLabel = $field->field_label;
            if (!array_key_exists($fieldLabel, $this->formData)) {
                $this->formData[$fieldLabel] = '';
                $this->rules[$fieldLabel] = $field->field_type;
            }
        }
    }
    

    public function render()
    {
        return view('livewire.layanan.create-request-surat', [
            'surat' => JenisSurat::find($this->selectedLetterId),
            'jenisSurat' => $this->jenisSurat,
            'formData' => $this->formData,
        ]);
    }
}
