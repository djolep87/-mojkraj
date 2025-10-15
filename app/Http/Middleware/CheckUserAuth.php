<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class CheckUserAuth
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Check if user is logged in with either regular auth or business auth
        if (!Auth::check() && !Auth::guard('business')->check()) {
            return redirect()->route('login')->with('error', 'Morate biti ulogovani da biste pristupili ovoj stranici.');
        }

        return $next($request);
    }
}
