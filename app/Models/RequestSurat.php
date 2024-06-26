<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RequestSurat extends Model
{
    use HasFactory;

    protected $fillable = [
        'jenis_surat_id',
        'user_id',
        'status',
        'catatan_admin',
        'form_data',
        'nomor_surat',
        'tanggal_surat',
        'file_surat',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function jenisSurat()
    {
        return $this->belongsTo(JenisSurat::class);
    }
}
