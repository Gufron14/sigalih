<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Warga extends Model
{
    use HasFactory;

    // protected $table = 'warga';

    protected $fillable = [
        'nik',
        'nama',
        'ttl',
        'jk',
        'alamat',
        'rt',
        'rw',
        'desa',
        'kec',
        'kab',
        'agama',
        'status',
        'pekerjaan'
    ];

    public function getMaskedNikAttribute()
    {
        return substr($this->nik, 0, 6) . str_repeat('*', strlen($this->nik) - 6);
    }

    public function scopeSearch($query, $keyword)
    {
        return $query->where(function ($query) use ($keyword) {
            $query->where('nik', 'like', "%{$keyword}%")
                  ->orWhere('nama', 'like', "%{$keyword}%")
                  ->orWhere('alamat', 'like', "%{$keyword}%");
                  // tambahkan kolom lain sesuai kebutuhan
        });
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
