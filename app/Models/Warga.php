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

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
