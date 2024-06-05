<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FormField extends Model
{
    use HasFactory;

    protected $fillable = [
        'field_label',
        'field_type',
        'jenis_surat_id',
        'request_surat_id',
    ];

    public function jeniSurat()
    {
        return $this->belongsTo(JenisSurat::class);
    }

    public function requestSurat()
    {
        return $this->belongsTo(RequestSurat::class);
    }
}
