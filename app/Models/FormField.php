<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FormField extends Model
{
    use HasFactory;

    protected $fillable = [
        'field_name',
        'field_label',
        'field_type',
        'rules',
        'jenis_surat_id',
    ];

    public function jeniSurat()
    {
        return $this->belongsTo(JenisSurat::class);
    }
}
