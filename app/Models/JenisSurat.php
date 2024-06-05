<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JenisSurat extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama_surat', 'desc', 'singkatan',
    ];

    public function requestSurat()
    {
        return $this->hasMany(RequestSurat::class);
    }

    public function formFields() 
    {
        return $this->hasMany(FormField::class);
    }

    public function fileSurat()
    {
        return $this->hasOne(FileSurat::class);
    }
}
