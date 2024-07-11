<?php

namespace App\Models;

use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Sanctum\HasApiTokens;

class Admin extends Model implements Authenticatable
{
    use HasFactory, HasApiTokens;

    protected $fillable = [
        'username',
        'password',
        'avatar',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $rememberTokenName = 'remember_token';

    public function getAuthIdentifierName()
{
    return 'id';
}

public function getAuthIdentifier()
{
    return $this->getKey();
}

public function getAuthPassword()
{
    return $this->password;
}

public function getRememberToken()
{
    return $this->remember_token;
}

public function setRememberToken($value)
{
    $this->remember_token = $value;
}

public function getRememberTokenName()
{
    return 'remember_token';
}

}
