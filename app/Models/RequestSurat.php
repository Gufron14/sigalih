<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RequestSurat extends Model
{
    use HasFactory;

    protected $fillable = ['jenis_surat_id', 'user_id', 'status', 'catatan_admin', 'form_data', 'nomor_surat', 'tanggal_surat', 'file_surat', 'warga_id'];

    protected static function booted()
    {
        static::creating(function ($requestSurat) {
            if (is_null($requestSurat->expired_at)) {
                $requestSurat->expired_at = now()->addDays(30);
            }
        });
    }

    protected $dates = ['tanggal_surat', 'expired_at'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function warga()
    {
        return $this->belongsTo(Warga::class);
    }

    public function jenisSurat()
    {
        return $this->belongsTo(JenisSurat::class);
    }
}
