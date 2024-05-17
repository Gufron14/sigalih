<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use PHPOpenSourceSaver\JWTAuth\Facades\JWTAuth as FacadesJWTAuth;
use PHPOpenSourceSaver\JWTAuth\JWTAuth;
use Symfony\Component\HttpFoundation\Response;

class ApiAuth
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if($request->header('Authorization')){
            if(auth('user')->user()){
                return $next($request);
            }else{
                return response()->json([
                    'status' => 'Error',
                    'message' => 'Unauthorized',
                ],400);
            }
        }else{
            return response()->json([
                'status' => 'Error',
                'message' => 'token not provided',
            ],400);
        }
    }
}
