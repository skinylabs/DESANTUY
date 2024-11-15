<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class UserMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Memeriksa apakah user sudah login (session 'logged_in')
        if ($request->session()->has('logged_in')) {
            return $next($request);
        }

        // Jika belum login, redirect ke halaman informasi atau login
        return redirect()->route('tour.info')->with('error', 'Masukkan Kode terlebih dahulu.');
    }
}
