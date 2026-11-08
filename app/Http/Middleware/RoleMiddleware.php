<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class RoleMiddleware
{
    // # MEMERIKSA ROLE PENGGUNA
    // Membatasi akses halaman berdasarkan role akun.
    public function handle(Request $request, Closure $next, string $role): Response
    {
        // Memastikan pengguna sudah login.
        if (!Auth::check()) {
            return redirect()->route('login');
        }

        // Memeriksa kesesuaian role pengguna.
        if (Auth::user()->role !== $role) {
            abort(403, 'Anda tidak memiliki akses ke halaman ini.');
        }

        // Melanjutkan permintaan jika role sesuai.
        return $next($request);
    }
}
