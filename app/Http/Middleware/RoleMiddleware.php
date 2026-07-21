<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class RoleMiddleware
{
    public function handle(Request $request, Closure $next, ...$roles): Response
    {
        if (!auth()->check()) {
            return redirect('/login');
        }

        $role = auth()->user()->role;

        if (!in_array($role, $roles)) {
            return match ($role) {
                'admin'  => redirect('/admin')->with('error', 'Kamu tidak memiliki akses ke halaman tersebut.'),
                'dokter' => redirect('/dokter')->with('error', 'Kamu tidak memiliki akses ke halaman tersebut.'),
                'pasien' => redirect('/pasien')->with('error', 'Kamu tidak memiliki akses ke halaman tersebut.'),
                default  => redirect('/login'),
            };
        }

        return $next($request);
    }
}