<?php

namespace App\Models\BankSampah;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PenarikanSaldo extends Model
{
    use HasFactory;

    protected $fillable = [
        'nasabah_id',
        'nominal',
        'status',
    ];

    public function nasabah()
    {
        return $this->belongsTo(User::class, 'id', 'id');
    }

    public function riwayatSetoran()
    {
        return $this->belongsTo(RiwayatSetoran::class, 'nasabah_id', 'nasabah_id');
    }
}
