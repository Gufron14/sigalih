<?php

namespace App\Livewire\Layanan;

use App\Models\User;
use Livewire\Component;
use App\Models\JenisSurat;
use App\Models\RequestSurat;
use Livewire\WithFileUploads;
use Livewire\Attributes\Title;
use Illuminate\Support\Facades\Auth;

#[Title('Buat Permohonan')]
class CreateRequestSurat extends Component
{
    use WithFileUploads;

    protected $listeners = ['requestSubmitted' => '$refresh'];
    public $jenisSurat;
    public $selectedLetterId;
    public $formFields;
    public $formData = [];
    public $file;
    public $statusPermohonan;
    public $existingRequest;
    public $rules = [
        'file' => 'required|file|max:2048', // Aturan validasi untuk file
    ];

    public function mount($nama_surat)
    {
        $this->jenisSurat = JenisSurat::where('nama_surat', $nama_surat)->firstOrFail();
        $this->selectedLetterId = $this->jenisSurat->id;
        $this->checkExistingRequest();
        $this->loadFormFields();
    }

    public function checkExistingRequest()
    {
        $this->existingRequest = RequestSurat::where('user_id', auth()->id())
            ->where('jenis_surat_id', $this->selectedLetterId)
            // ->where('status', '!=', 'tolak')
            ->where(function ($query) {
                $query->where('expired_at', '>', now())
                      ->orWhereNull('expired_at');
            })
            ->first();

        if ($this->existingRequest) {
            $this->statusPermohonan = $this->existingRequest->status;
        } else {
            $this->statusPermohonan = null;
        }
    }

    public function submit()
    {
        $this->validate();

        foreach ($this->formData as $key => $value) {
            if ($value instanceof \Livewire\Features\SupportFileUploads\TemporaryUploadedFile) {
                $filePath = $value->store('uploads', 'public');
                $this->formData[$key] = $filePath;
            }
        }

        RequestSurat::where('jenis_surat_id', $this->selectedLetterId)
                    ->where('user_id', Auth::id())
                    ->delete();

        RequestSurat::create([
            'jenis_surat_id' => $this->selectedLetterId,
            'user_id' => auth()->id(),
            'form_data' => json_encode($this->formData),
            'status' => 'tunggu',
        ]);

        $this->reset(['formData', 'file']);
        $this->checkExistingRequest(); // Re-check existing requests after submission

        session()->flash('success', $this->jenisSurat->nama_surat . ' berhasil diajukan.');

        $this->dispatch('requestSubmitted')->to(\App\Livewire\Admin\Layanan\Pengajuan\Index::class);
        // $this->emitTo('admin.layanan.pengajuan.index', 'requestSubmitted');

        logger('Permohonan berhasil diajukan.');
    }

    protected function loadFormFields()
    {
        $jenisSurat = JenisSurat::with('formFields')->find($this->selectedLetterId);

        if ($jenisSurat->formFields->isEmpty()) {
            session()->flash('message', 'Formulir surat kosong.');
            return;
        }

        $this->rules = [];
        $this->formData = [];
        $this->formFields = $jenisSurat->formFields;

        foreach ($jenisSurat->formFields as $field) {
            $fieldLabel = $field->field_label;
            if (!array_key_exists($fieldLabel, $this->formData)) {
                $this->formData[$fieldLabel] = '';
                $this->rules['formData.' . $fieldLabel] = 'required';
                if ($field['field_type'] === 'file') {
                    $this->rules['formData.' . $fieldLabel] .= '|file';
                }
            }
        }
    }

    public function render()
    {
        $request_surat = RequestSurat::where('user_id', auth()->id())
            ->latest()
            ->first();
        $jenisSurat = JenisSurat::all();

        return view('livewire.layanan.create-request-surat', [
            'surat' => $this->jenisSurat,
            'jenisSurat' => $jenisSurat,
            'formData' => $this->formData,
            'request_surat' => $request_surat,
            'statusPermohonan' => $this->statusPermohonan,
        ]);
    }
}
