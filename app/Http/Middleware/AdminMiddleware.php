<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class AdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Memeriksa apakah user sudah login
        if (Auth::check()) {
            // Memeriksa apakah user memiliki role yang sesuai
            if (Auth::user()->role != 'admin') {
                // Jika role tidak sesuai, redirect ke halaman lain atau tampilkan pesan error
                return redirect('/')->with('error', 'Anda tidak memiliki akses ke halaman ini.');
            }
        }
        return $next($request); // Lanjutkan ke halaman berikutnya
    }
}
