<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

class AdminOsisMidleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Pastikan user memiliki role 'admin' atau 'osis'
        if (Auth::check() && !in_array(Auth::user()->role, ['admin', 'osis'])) {
            abort(403, 'Oops! You do not have permission to access.');
        }
        return $next($request);
    }
}
