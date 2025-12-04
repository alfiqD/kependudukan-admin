<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckRole
{
    public function handle(Request $request, Closure $next, ...$roles)
    {
        // jika belum login → redirect ke login
        if (!Auth::check()) {
            return redirect('/auth')->with('error', 'Silakan login dulu.');
        }

        // jika login tapi rolenya tidak cocok
        if (!in_array(Auth::user()->role, $roles)) {
            return abort(403, 'Akses ditolak');
        }

        return $next($request);
    }
}

