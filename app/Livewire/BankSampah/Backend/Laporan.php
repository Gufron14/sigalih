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
    public $startDate;
    public $endDate;
    public $filterType = 'all';

    public function mount()
    {
        $this->loadTransactions();
    }

    private function calculateTotals()
    {
        $saldo = 0;
        foreach ($this->transactions as $transaction) {
            $saldo -= $transaction->dana_keluar;
            $saldo += $transaction->dana_masuk;
            $transaction->sisa_saldo = $saldo;
        }

        $this->totalDanaMasuk = $this->transactions->sum('dana_masuk');
        $this->totalDanaKeluar = $this->transactions->sum('dana_keluar');
        $this->totalSaldo = $saldo;
    }

    public function loadTransactions()
    {
        $query = DB::table(function ($query) {
            $query->from('riwayat_setorans')
                ->where('jenis_transaksi', 'tunai')
                ->select('created_at', 'total_pendapatan as nominal', DB::raw("'Setoran Tunai' as ket"))
                ->selectRaw('total_pendapatan as dana_keluar')
                ->selectRaw('0 as dana_masuk')
                ->union(PenarikanSaldo::query()->where('status', 'selesai')
                    ->select('created_at', 'nominal', DB::raw("'Penarikan Saldo' as ket"))
                    ->selectRaw('nominal as dana_keluar')
                    ->selectRaw('0 as dana_masuk'))
                ->union(Pemasukan::query()->select('created_at', 'nominal', 'ket')
                    ->selectRaw('0 as dana_keluar')
                    ->selectRaw('nominal as dana_masuk'));
        }, 'combined_transactions');

        if ($this->startDate) {
            $query->where('created_at', '>=', $this->startDate);
        }
        if ($this->endDate) {
            $query->where('created_at', '<=', $this->endDate);
        }
        if ($this->filterType === 'masuk') {
            $query->where('dana_masuk', '>', 0);
        } elseif ($this->filterType === 'keluar') {
            $query->where('dana_keluar', '>', 0);
        }

        $this->transactions = $query->orderBy('created_at', 'asc')->get()
        ->map(function ($transaction) {
            $transaction->created_at = \Illuminate\Support\Carbon::parse($transaction->created_at);
            return $transaction;
        });

        $this->calculateTotals();
    }

    public function applyFilters()
    {
        $this->loadTransactions();
    }

    public function downloadPdf()
    {
        $this->loadTransactions();

        $currentDate = now()->format('d-m-Y');
        $filename = "{$currentDate}-Laporan-Bank-Sampah.pdf";

        $pdf = Pdf::loadView('livewire.bank-sampah.backend.laporan-pdf', [
            'transactions' => $this->transactions,
            'totalDanaMasuk' => $this->totalDanaMasuk,
            'totalDanaKeluar' => $this->totalDanaKeluar,
            'totalSaldo' => $this->totalSaldo,
        ])->setPaper('a4', 'portrait');

        return response()->streamDownload(function () use ($pdf) {
            echo $pdf->output();
        }, $filename);
    }

    public function render()
    {
        return view('livewire.bank-sampah.backend.laporan');
    }
}
