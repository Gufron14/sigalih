<?php

namespace App\Livewire\Admin\User;

use App\Models\Warga;
use Livewire\Component;
use App\Exports\WargaExport;
use App\Imports\WargaImport;
use Livewire\WithPagination;
use Livewire\WithFileUploads;
use Livewire\Attributes\Title;
use Livewire\Attributes\Layout;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Facades\Excel;

#[Title('Warga')]
#[Layout('livewire.admin.layouts.app')]
class Index extends Component
{
    use WithFileUploads;
    use WithPagination;

    public $file;
    public $password;
    public $keyword = '';
    public $wargaId;

    public $search = '';
    public $sortBy = 'id';
    public $orderBy = 'asc';
    public $perPage = 50;

    protected $rules = [
        'adminPassword' => 'required',
        // aturan validasi lainnya
    ];

    public function verifyPassword($wargaId)
    {
        $this->wargaId = $wargaId;
        $this->validate([
            'password' => 'required',
        ]);
    
        $admin = Auth::guard('admin')->user();
    
        if (Hash::check($this->password, $admin->password)) {
            return redirect()->route('updateWarga', ['id' => $wargaId]);
        }
    
        session()->flash('error', 'Password salah');
        return redirect()->route('warga');
    }
    

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function sortBy($field)
    {
        if ($this->sortBy === $field) {
            $this->orderBy = $this->orderBy === 'asc' ? 'desc' : 'asc';
        } else {
            $this->sortBy = $field;
            $this->orderBy = 'asc';
        }
    }

    // Import CSV/Excel
    public function import()
    {
        // Validasi bahwa file telah diunggah
        $this->validate([
            'file' => 'required|file|mimes:csv,xlsx,xls',
        ]);

        // Dapatkan file yang diunggah
        $file = $this->file;

        // Dapatkan nama asli file
        $fileName = $file->getClientOriginalName();

        // Pindahkan file ke folder penyimpanan
        $filePath = $file->storeAs('public', $fileName);

        // Import data dari file
        Excel::import(new WargaImport(), storage_path('app/' . $filePath));

        // Redirect kembali dengan pesan sukses
        session()->flash('success', 'File berhasil diimport.');
        return redirect()->back();
    }

    // Export Excel
    public function export()
    {
        return Excel::download(new WargaExport(), 'users.xlsx');
    }

    public function render()
    {
        $wargas = Warga::query()
            ->where('nama', 'like', '%' . $this->search . '%')
            ->orderBy($this->sortBy, $this->orderBy)
            ->paginate(50);

        return view('livewire.admin.user.index', compact('wargas'));
    }
}
