<?php

namespace App\Models\BankSampah\Backend;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pemasukan extends Model
{
    use HasFactory;

    protected $fillable = [
        'ket', 'nominal', 'desc'
    ];
}
