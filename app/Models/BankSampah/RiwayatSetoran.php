<?php

namespace App\Models\BankSampah;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RiwayatSetoran extends Model
{
    use HasFactory;

    protected $fillable = [
        'nasabah_id',
        'jenis_sampah_id',
        'berat_sampah',
        'pendapatan',
        'jenis_transaksi',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function jenisSampah()
    {
        return $this->belongsTo(JenisSampah::class, 'jenis_sampah_id');
    }
}
