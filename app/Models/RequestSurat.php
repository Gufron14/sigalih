<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RequestSurat extends Model
{
    use HasFactory;

    protected $fillable = [
        'nik',
        'jenis_surat_id',
        'user_id',
        'data_permintaan',
        'status',
        'catatan_admin',
        'form_data'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function jenisSurat()
    {
        return $this->belongsTo(JenisSurat::class);
    }

    public function formField()
    {
        return $this->hasOne(FormField::class);
    }
}
