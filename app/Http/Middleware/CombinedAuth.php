<?php

namespace App\Http\Middleware;

use Closure;
use GuzzleHttp\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Symfony\Component\HttpFoundation\Response;
use PHPOpenSourceSaver\JWTAuth\Facades\JWTAuth;

class CombinedAuth
{
    public function handle(Request $request, Closure $next): Response
    {
        // Handling API requests
        if ($request->is('api/*')) {
            if ($request->header('Authorization')) {
                try {
                    $token = str_replace('Bearer ', '', $request->header('Authorization'));
                    JWTAuth::setToken($token);

                    if (auth('api')->check()) {
                        return $next($request);
                    } else {
                        return response()->json([
                            'status' => 'Error',
                            'message' => 'Unauthorized',
                        ], 400);
                    }
                } catch (\Exception $e) {
                    return response()->json([
                        'status' => 'Error',
                        'message' => 'Token could not be parsed',
                    ], 400);
                }
            } else {
                return response()->json([
                    'status' => 'Error',
                    'message' => 'Token not provided',
                ], 400);
            }
        }

        // Handling frontend requests
        if (session('token')) {
            try {
                $client = new Client([
                    'headers' => [
                        'Authorization' => 'Bearer ' . session('token'),
                    ],
                ]);

                $pResponse = $client->request('GET', env('API_URL') . '/api/user/me');
                $pBody = $pResponse->getBody()->getContents();
                $pData = json_decode($pBody, true);

                if ($pData && isset($pData['user'])) {
                    $userData = $pData['user'];
                    Session::put('userData', $userData);
                    view()->share('userData', $userData);

                    return $next($request);
                } else {
                    session()->forget('token');
                    return redirect()->route('login')->with('error', 'Unauthorized');
                }
            } catch (\Exception $e) {
                session()->forget('token');
                return redirect()->route('login')->with('error', 'Token could not be parsed');
            }
        }

        // Store intended URL if user is not authenticated
        if (!$request->is('login')) {
            session()->put('url.intended', $request->url());
        }

        return redirect()->route('login')->with('error', 'Token not provided');
    }
}

