<?php

namespace App\Livewire\BankSampah\Backend;

use Livewire\Component;
use Livewire\Attributes\Title;
use Barryvdh\DomPDF\Facade\Pdf;
use Livewire\Attributes\Layout;
use Illuminate\Support\Facades\DB;
use App\Models\BankSampah\PenarikanSaldo;
use App\Models\BankSampah\RiwayatSetoran;
use App\Models\BankSampah\Backend\Pemasukan;

#[Layout('livewire.bank-sampah.backend.layout.bs-layout')]
#[Title('Laporan Bank Sampah')]
class Laporan extends Component
{
    public $transactions;
    public $totalDanaMasuk = 0;
    public $totalDanaKeluar = 0;
    public $totalSaldo = 0;

    public function mount()
    {
        $this->loadTransactions();
    }

    public function loadTransactions()
    {
        $riwayatSetoran = RiwayatSetoran::query()->where('jenis_transaksi', 'tunai')->select('created_at', 'total_pendapatan as nominal', DB::raw("'Setoran Tunai' as ket"))->selectRaw('total_pendapatan as dana_keluar')->selectRaw('0 as dana_masuk');

        $penarikanSaldo = PenarikanSaldo::query()->where('status', 'selesai')->select('created_at', 'nominal', DB::raw("'Penarikan Saldo' as ket"))->selectRaw('nominal as dana_keluar')->selectRaw('0 as dana_masuk');

        $pemasukan = Pemasukan::query()->select('created_at', 'nominal', 'ket')->selectRaw('0 as dana_keluar')->selectRaw('nominal as dana_masuk');

        $this->transactions = $riwayatSetoran->union($penarikanSaldo)->union($pemasukan)->get();

        $saldo = $this->totalSaldo; 
        foreach ($this->transactions as $transaction) {
            $saldo -= $transaction->dana_keluar; // Kurangi pengeluaran terlebih dahulu
            $saldo += $transaction->dana_masuk; // Tambahkan pemasukan
            $transaction->sisa_saldo = $saldo;
        }

        $this->totalDanaMasuk = $this->transactions->sum('dana_masuk');
        $this->totalDanaKeluar = $this->transactions->sum('dana_keluar');
        $this->totalSaldo = $saldo; // Menyimpan saldo total yang telah dihitung
    }

    public function downloadPdf()
    {
        $this->loadTransactions();

        $pdf = Pdf::loadView('livewire.bank-sampah.backend.laporan-pdf', [
            'transactions' => $this->transactions,
            'totalDanaMasuk' => $this->totalDanaMasuk,
            'totalDanaKeluar' => $this->totalDanaKeluar,
            'totalSaldo' => $this->totalSaldo,
        ])->setPaper('a4', 'portrait');

        return response()->streamDownload(function () use ($pdf) {
            echo $pdf->output();
        }, 'laporan-bank-sampah.pdf');
    }

    public function render()
    {
        return view('livewire.bank-sampah.backend.laporan');
    }
}
