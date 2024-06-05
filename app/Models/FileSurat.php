<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FileSurat extends Model
{
    use HasFactory;

    protected $fillable = [
        // 'user_id',
        'jenis_surat_id',
        // 'request_surat_id',
        'file_path',
        // 'status',
        // 'tgl_persetujuan',
    ];

    public function jenisSurat()
    {
        return $this->belongsTo(JenisSurat::class);
    }

    public function requestSurat()
    {
        return $this->belongsTo(RequestSurat::class);
    }
}
