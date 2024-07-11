<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Symfony\Component\HttpFoundation\Response;

class VerifyAdminPassword
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next)
    {
        if (Auth::guard('admin')->check()) {
            $admin = Auth::guard('admin')->user();
    
            if ($request->isMethod('get') && $request->route()->getName() === 'updateWarga') {
                return redirect()->route('admin.verifyPassword', ['redirectTo' => $request->fullUrl()]);
            }
    
            if ($request->isMethod('post') && $request->has('password')) {
                if (Hash::check($request->input('password'), $admin->password)) {
                    return $next($request);
                }
    
                return redirect()->back()->withErrors(['password' => 'Password admin salah.']);
            }
        }
    
        return $next($request);
    }   
}
