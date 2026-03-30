<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     */
    public function handle(Request $request, Closure $next, ...$guards)
    {
        $guards = empty($guards) ? [null] : $guards;

        foreach ($guards as $guard) {
            if (Auth::guard($guard)->check()) {
                $user = Auth::user();
                
                // Jika admin, redirect ke /dashboard
                if ($user->role === 'admin') {
                    return redirect('/dashboard');
                }
                
                // Jika bukan admin, redirect ke home
                return redirect('/');
            }
        }

        return $next($request);
    }
}