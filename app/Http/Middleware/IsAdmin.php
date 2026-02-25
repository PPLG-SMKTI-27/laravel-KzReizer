<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class IsAdmin
{
    /**
     * Handle an incoming request.
     */
    public function handle(Request $request, Closure $next)
    {
        // Cek apakah user sudah login
        if (!Auth::check()) {
            return redirect()->route('login')->with('error', 'Silakan login terlebih dahulu.');
        }

        // Cek apakah role user adalah admin
        if (Auth::user()->role !== 'admin') {
            // Jika bukan admin, logout dan redirect ke home dengan pesan
            Auth::logout();
            
            // Hancurkan session
            $request->session()->invalidate();
            $request->session()->regenerateToken();
            
            return redirect('/')->with('error', 'Anda tidak memiliki akses ke halaman admin. Silakan login dengan akun admin.');
        }

        return $next($request);
    }
}