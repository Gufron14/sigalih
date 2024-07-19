<?php

namespace App\Livewire\BankSampah\Backend\Sampah;

use App\Models\User;
use Livewire\Component;
use Livewire\Attributes\Title;
use Livewire\Attributes\Layout;
use App\Models\BankSampah\Tabungan;
use App\Models\BankSampah\PenarikanSaldo;

#[Title('Pengajuan Penarikan Saldo - Sampah Sigalih')]
#[Layout('livewire.bank-sampah.backend.layout.bs-layout')]
class Transaksi extends Component
{
    public function updateStatus($id, $status)
    {
        // Dapatkan entri penarikan dari database
        $penarikan = PenarikanSaldo::findOrFail($id);

        // Perbarui status penarikan
        $penarikan->status = $status;
        $penarikan->save();

        session()->flash('success', 'Status penarikan berhasil diperbarui.');

        // Jika penarikan disetujui oleh admin
        if ($penarikan->status === 'selesai') {
            // Dapatkan tabungan pengguna
            $tabungan = Tabungan::where('nasabah_id', auth()->user()->id)->firstOrFail();

            // Kurangi saldo pengguna sesuai dengan jumlah penarikan
            $tabungan->saldo -= $penarikan->nominal;
            $tabungan->pengeluaran += $penarikan->nominal;
            $tabungan->save();

            // Perbarui saldo dan pengeluaran pada komponen
            // $this->saldo = $tabungan->saldo;
            // $this->pengeluaran = $tabungan->pengeluaran;
        }
    }

    public function render()
    {
        $penarikans = PenarikanSaldo::join('users', 'penarikan_saldos.nasabah_id', '=', 'users.id')
            ->join('wargas', 'users.NIK', '=', 'wargas.NIK')
            ->select('penarikan_saldos.*', 'wargas.nama as nama_warga')
            ->orderBy('penarikan_saldos.created_at', 'desc')->get();
        return view('livewire.bank-sampah.backend.sampah.transaksi', compact('penarikans'));
    }
}
