<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pengajuan extends Model
{
    use HasFactory;

    protected $fillable = [
        'nik',
        'user_id',
        'id_surat',
        'status'
    ];

    public function warga()
    {
        return $this->belongsTo(Warga::class, 'nik', 'nik');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'nik', 'nik');
    }

    public function surat()
    {
        return $this->belongsTo(Surat::class, 'id_surat', 'id');
    }
}
