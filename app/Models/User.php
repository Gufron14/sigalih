<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Notifications\Notifiable;
use App\Models\BankSampah\PenarikanSaldo;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $fillable = [
        'nik',
        'email',
        'phone',
        'password',
        'avatar',
    ];

    public function getMaskedNikAttribute()
    {
        return substr($this->nik, 0, 6) . str_repeat('*', strlen($this->nik) - 6);
    }

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function warga(): HasOne
    {
        return $this->hasOne(Warga::class, 'nik', 'nik');
    }

    public function requestSurat()
    {
        return $this->hasMany(RequestSurat::class);
    }

    public function formFields()
    {
        return $this->hasMany(FormField::class);
    }

    public function penarikanSaldo()
    {
        return $this->hasMany(PenarikanSaldo::class, 'nasabah_id', 'id');
    }
}
