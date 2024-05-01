<?php

namespace App\Models;

use App\Models\Layanan;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class JenisSurat extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama_surat',
        'deskripsi',
        'template'
    ];

    public function layanan()
    {
        return $this->hasMany(Layanan::class);
    }
}
