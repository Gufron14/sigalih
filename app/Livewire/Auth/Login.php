<?php

namespace App\Livewire\Auth;

use App\Models\User;
use GuzzleHttp\Client;
use Livewire\Component;
use Illuminate\Http\Request;
use Livewire\Attributes\Title;
use Illuminate\Support\Facades\Http;
use PHPOpenSourceSaver\JWTAuth\JWTAuth;
use Illuminate\Support\Facades\Password;
use PHPOpenSourceSaver\JWTAuth\Exceptions\JWTException;

#[Title('Login - Desa Sirnagalih')]
class Login extends Component
{
    public $nik;
    public $password;

    protected $rules = [
        'nik' => ['required', 'exists:wargas,nik'],
        'password' => ['required', 'min:8'],
    ];

    public function login()
    {
        $this->validate();

        $credentials = ['nik' => $this->nik, 'password' => $this->password];

        try {
            if (!$token = auth()->attempt($credentials)) {
                session()->flash('error', 'NIK and password invalid.');
                return;
            }
        } catch (JWTException $e) {
            session()->flash('error', 'Could not create token.');
            return;
        }

        $user = User::where('nik', $this->nik)->first();
        $user->token = $token;
        $user->save();

        session()->flash('message', 'Successfully logged in.');
        session()->flash('token', $token);

        return redirect()->to('layanan');
    }
    
    public function logout()
    {
        auth()->logout();

        return redirect()->route('login');
    }

    public function render()
    {
        return view('livewire.auth.login');
    }
}
