<?php

namespace App\Models\BankSampah;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JenisSampah extends Model
{
    use HasFactory;

    protected $fillable = [
        'jenis_sampah', 'harga_per_kg', 'desc'
    ];

    public function riwayatSetoran()
    {
        return $this->hasMany(RiwayatSetoran::class);
    }
}
