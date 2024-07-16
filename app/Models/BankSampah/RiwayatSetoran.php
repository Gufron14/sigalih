<?php

namespace App\Models\BankSampah;

use App\Models\DetailRiwayatSetoran;
use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class RiwayatSetoran extends Model
{
    use HasFactory;

    protected $fillable = [
        'nasabah_id',
        'jenis_transaksi',
        'total_berat_sampah',
        'total_pendapatan',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'id', 'id');
    }

    public function jenisSampah()
    {
        return $this->belongsTo(JenisSampah::class, 'jenis_sampah_id');
    }

    public function riwayatSetoranDetails(): HasMany
    {
        return $this->hasMany(DetailRiwayatSetoran::class);
    }

    public function tabungan()
    {
        return $this->belongsTo(Tabungan::class, 'nasabah_id', 'nasabah_id');
    }

    public function penarikanSaldo()
    {
        return $this->hasOne(PenarikanSaldo::class, 'nasabah_id', 'nasabah_id');
    }

}
