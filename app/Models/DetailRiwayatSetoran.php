<?php

namespace App\Models;

use App\Models\BankSampah\JenisSampah;
use Illuminate\Database\Eloquent\Model;
use App\Models\BankSampah\RiwayatSetoran;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class DetailRiwayatSetoran extends Model
{
    use HasFactory;

    protected $fillable = [
        'riwayat_setoran_id',
        'jenis_sampah_id',
        'berat_sampah',
        'pendapatan',
    ];

    public function riwayatSetoran(): BelongsTo
    {
        return $this->belongsTo(RiwayatSetoran::class);
    }

    public function jenisSampah(): BelongsTo
    {
        return $this->belongsTo(JenisSampah::class);
    }
}
