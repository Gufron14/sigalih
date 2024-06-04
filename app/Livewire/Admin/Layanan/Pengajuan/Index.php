<?php

namespace App\Livewire\Admin\Layanan\Pengajuan;

use Livewire\Component;
use App\Models\Pengajuan;
use App\Models\RequestSurat;
use Livewire\Attributes\Title;
use Livewire\Attributes\Layout;

#[Layout('livewire.admin.layouts.app')]
#[Title('Daftar Permohonan')]
class Index extends Component
{
    public function render()
    {
        $pengajuans = RequestSurat::with(['warga', 'surat'])->orderBy('created_at', 'desc')->get();

        // Inisialisasi array untuk menyimpan format waktu
        $timeFormats = [];

        // Iterasi melalui setiap pengajuan
        foreach ($pengajuans as $pengajuan) {
            // Mengambil waktu pembuatan (created_at) dari setiap pengajuan
            $yourDateTime = $pengajuan->created_at;

            // Hitung perbedaan waktu dalam menit antara waktu saat ini dan waktu pembuatan
            $timeDiffInMinutes = now()->diffInMinutes($yourDateTime);
            $timeDiffInHours = now()->diffInHours($yourDateTime);
            $timeDiffInDays = now()->diffInDays($yourDateTime);
            $timeFormat = ''; // Inisialisasi variabel untuk menyimpan format waktu yang tepat

            // Jika perbedaan waktu kurang dari 60 menit
            if ($timeDiffInMinutes < 60) {
                $timeFormat = $timeDiffInMinutes . ' menit lalu';
            }
            // Jika perbedaan waktu kurang dari 24 jam (1440 menit)
            elseif ($timeDiffInHours < 24) {
                $timeFormat = $timeDiffInHours . ' jam lalu';
            }
            // Jika perbedaan waktu kurang dari setahun (365 hari)
            elseif ($timeDiffInDays < 365) {
                $timeFormat = $yourDateTime->diffForHumans(); // Format waktu seperti '3 hari lalu'
            }
            // Jika perbedaan waktu lebih dari setahun
            else {
                $timeFormat = $yourDateTime->format('d M Y'); // Format waktu sebagai tanggal lengkap, misalnya '01 Jan 2022'
            }

            // Tambahkan format waktu yang sudah ditentukan ke dalam array timeFormats
            $timeFormats[] = $timeFormat;
        }

        return view('livewire.admin.layanan.pengajuan.index', compact('pengajuans'));
    }
}
