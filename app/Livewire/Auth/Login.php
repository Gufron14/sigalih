<?php

namespace App\Livewire\Auth;

use GuzzleHttp\Client;
use Livewire\Component;
use Illuminate\Http\Request;

class Login extends Component
{
    public function login(Request $request)
    {
        $client = new Client(['base_uri' => env('APP_URL')]);
        $url = env('APP_URL') . '/api/user/login';

        $cResponse = $client->request('POST', $url, ['json' => [
            'nik' => $request->nik,
            'password' => $request->password
        ]]);

        $cBody = $cResponse->getBody()->getContents();
        $data = json_decode($cBody, true);
        extract($data);

        if ($data['status']) {
            $sesi = session()->put('token', $data['token']);
            $sesi = session()->put('user', $data['user']['id']);
            
            return redirect()->to('/');
        }

        return view("auth.login", $data);

    }

    public function render()
    {
        return view('livewire.auth.login');
    }
}
