<?php

namespace App\Livewire\Admin\Layanan\Pengajuan;

use Livewire\Component;
use App\Models\FormField;
use App\Models\JenisSurat;
use App\Models\RequestSurat;
use App\Models\Warga;
use Livewire\Attributes\Title;
use Livewire\Attributes\Layout;
use Livewire\WithFileUploads;

#[Layout('livewire.admin.layouts.app')]
#[Title('Buat Surat')]
class Create extends Component
{
    use WithFileUploads;

    public $jenisSurat;
    public $selectedJenisSurat;
    public $formFields;
    public $formData = [];
    public $file;
    public $selectedWarga = null;

    protected $rules = [
        'formData.*' => 'required', // Aturan validasi untuk form data
        // 'selectedWarga' => 'required|exists:wargas,id',
    ];

    public function mount()
    {
        $this->selectedJenisSurat = JenisSurat::first()->id;
        // $this->selectedWarga = Warga::first()->id;
        $this->loadFormFields();
    }

    public function updatedSelectedJenisSurat($value)
    {
        $this->formData = [];
        $this->formFields = FormField::where('jenis_surat_id', $value)->get();
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

        

        RequestSurat::create([
            'warga_id' => $this->selectedWarga,
            'jenis_surat_id' => $this->selectedJenisSurat,
            'form_data' => json_encode($this->formData),
            'status' => 'tunggu',
        ]);

        $this->reset(['formData', 'file']);

        session()->flash('message', JenisSurat::find($this->selectedJenisSurat)->nama_surat . ' berhasil diajukan.');
    }

    protected function loadFormFields()
    {
        $jenisSurat = JenisSurat::with('formFields')->find($this->selectedJenisSurat);

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
                    $this->rules['formData.' . $fieldLabel] .= '|file|max:2048';
                }
            }
        }
    }

    public function render()
    {
        $surats = JenisSurat::all();
        $wargas = Warga::all();
        return view('livewire.admin.layanan.pengajuan.create', [
            'surats' => $surats,
            'jenisSurat' => $this->jenisSurat,
            'formData' => $this->formData,
            'wargas' => $wargas,
        ]);
    }
}
