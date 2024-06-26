<?php

namespace App\Livewire\BankSampah\Backend\Sampah;

use App\Models\User;
use Livewire\Component;
use Livewire\Attributes\Title;
use Livewire\Attributes\Layout;
use App\Models\BankSampah\JenisSampah;
use App\Models\BankSampah\RiwayatSetoran;
use App\Models\BankSampah\Tabungan;
use App\Models\DetailRiwayatSetoran;

#[Title('Setor Sampah - Sampah Sigalih')]
#[Layout('livewire.bank-sampah.backend.layout.bs-layout')]
class SetorSampah extends Component
{   
    public $sampahs = [];
    public $inputs = [];
    public $checkedRows = [];
    public $totalBerat = 0;
    public $totalPendapatan = 0;
    public $selectAll = false;
    public $nasabahId;
    public $jenisTransaksi;


    public function mount()
    {
        $this->sampahs = JenisSampah::all();
        $this->nasabahId = '';
        $this->jenisTransaksi = '';

        foreach ($this->sampahs as $sampah) {
            $this->inputs[$sampah->id] = [
                'berat' => 0,
                'pendapatan' => 0,
            ];
            $this->checkedRows[$sampah->id] = false;
        }
    }

    public function updatedSelectAll($value)
    {
        foreach ($this->checkedRows as $id => $checked) {
            $this->checkedRows[$id] = $value;
        }
        $this->calculateTotals();
    }

    public function updatedInputs()
    {
        $this->calculateTotals();
    }

    public function updatedCheckedRows()
    {
        $this->calculateTotals();
    }

    public function calculateTotals()
    {
        $this->totalBerat = 0;
        $this->totalPendapatan = 0;

        foreach ($this->inputs as $id => $input) {
            // Periksa apakah checkbox dicentang
            if (!$this->checkedRows[$id]) {
                // Jika tidak, atur nilai berat ke 0
                $this->inputs[$id]['berat'] = 0;
            } else {
                // Jika dicentang, hitung total berat dan pendapatan seperti sebelumnya
                $this->totalBerat += (float)$input['berat'];
                $sampah = JenisSampah::find($id);
                $this->inputs[$id]['pendapatan'] = (float)$sampah->harga_per_kg * (float)$input['berat'];
                $this->totalPendapatan += $this->inputs[$id]['pendapatan'];
            }
        }
    }

    public function store()
    {   
        if (is_null($this->nasabahId) || $this->nasabahId === '') {
            session()->flash('error', 'Nama Nasabah harus dipilih.');
            return;
        }
    
        if (is_null($this->jenisTransaksi) || $this->jenisTransaksi === '') {
            session()->flash('error', 'Jenis Transaksi harus dipilih.');
            return;
        }
    
        $totalPendapatan = 0;

        $riwayatSetoran = RiwayatSetoran::create([
            'nasabah_id' => $this->nasabahId,
            'jenis_transaksi' => $this->jenisTransaksi,
            'total_berat_sampah' => $this->totalBerat,
            'total_pendapatan' => $this->totalPendapatan,
        ]);
    
        foreach ($this->sampahs as $sampah) {
            if ($this->checkedRows[$sampah->id]) {
                $detailSetoran = DetailRiwayatSetoran::create([
                    'riwayat_setoran_id' => $riwayatSetoran->id,
                    'jenis_sampah_id' => $sampah->id,
                    'berat_sampah' => $this->inputs[$sampah->id]['berat'],
                    'pendapatan' => $this->inputs[$sampah->id]['pendapatan'],
                ]);
                $totalPendapatan += $detailSetoran->pendapatan;
            }
        }

        $riwayatSetoran->total_pendapatan = $totalPendapatan;
        $riwayatSetoran->save();

        if ($this->jenisTransaksi === 'tabung') {
            $tabungan = Tabungan::firstOrCreate(['nasabah_id' => $this->nasabahId]);
            $tabungan->saldo += $this->totalPendapatan;
            $tabungan->pemasukan += $this->totalPendapatan;
            $tabungan->save();
        }
    
        // Reset inputan setelah menyimpan
        $this->resetInputs();
        session()->flash('success', 'Setoran berhasil disimpan.');
    }
    

    private function resetInputs()
    {
        foreach ($this->sampahs as $sampah) {
            $this->inputs[$sampah->id] = [
                'berat_sampah' => 0,
                'pendapatan' => 0,
            ];
            $this->checkedRows[$sampah->id] = false;
        }
        $this->totalBerat = 0;
        $this->totalPendapatan = 0;
        $this->nasabahId = '';
        $this->jenisTransaksi = '';
        $this->selectAll = false;
    }

    public function render()
    {   
        $nasabahs = User::with('warga')->get();
        return view('livewire.bank-sampah.backend.sampah.setor-sampah', [
            'sampahs' => $this->sampahs,
            'nasabahs' => $nasabahs,
        ]);
    }
}
