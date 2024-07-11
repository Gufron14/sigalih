<?php

namespace App\Actions\Fortify;

use Laravel\Fortify\Contracts\LoginViewResponse;

class CustomLoginViewResponse implements LoginViewResponse
{
    public function toResponse($request)
    {
        return view('livewire.admin.auth.login');
    }
}
