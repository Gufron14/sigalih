<?php

namespace App\Models\BankSampah;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Tabungan extends Model
{
    use HasFactory;

    protected $fillable = ['nasabah_id', 'saldo', 'pemasukan', 'pengeluaran'];

    public function nasabah()
    {
        return $this->belongsTo(User::class, 'nasabah_id');
    }
    
}
