<?php

namespace App\Http\Middleware;

use Closure;
use GuzzleHttp\Client;
use Illuminate\Http\Request;
use TheSeer\Tokenizer\Exception;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;
use PHPOpenSourceSaver\JWTAuth\Facades\JWTAuth;
use PHPOpenSourceSaver\JWTAuth\Exceptions\JWTException;

class UserAuth
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Check if the request has an Authorization header
        if(session('token')){
            try{
                $client = new Client(['headers' => [
                    'Authorization' => 'Bearer ' . session('token')
                ]]);
                $pResponse = $client->request('GET', env('url') . "me");
                $pBody = $pResponse->getBody()->getContents();
                $pData = json_decode($pBody, true);
                extract($pData);
        
                // Set the default variable here
                $userData = $pData['user'];
        
                // Pass the default variable to all views
                view()->share('userData', $userData);
        
                return $next($request);
            } catch ( Exception $e){
                session()->forget('token');
                return redirect()->route('login');
            }
        }
        return redirect()->route('login');
    }
}
