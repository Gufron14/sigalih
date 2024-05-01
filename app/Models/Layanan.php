<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Surat extends Model
{
    use HasFactory;

    protected $fillable = [
        'nik',
        'id_jenisSurat',
        'status',
        'created_at'
    ];

    public function warga()
    {
        return $this->belongsTo(Warga::class, 'nik', 'nik');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'nik', 'nik');
    }

    public function jenisSurat()
    {
        return $this->belongsTo(JenisSurat::class, 'id_jenisSurat', 'id_jenisSurat');
    }
}
