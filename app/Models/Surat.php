<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Surat extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama_surat',
        'desc',
        'template'
    ];

    public function pengajuan()
    {
        return $this->hasMany(Pengajuan::class);
    }
}
