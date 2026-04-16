<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  Closure(Request): (Response)  $next
     */
    public function handle(Request $request, Closure $next)
    {
        // Jika user login dan rolenya adalah admin, izinkan lewat
        if (auth()->check() && auth()->user()->role == 'admin') {
            return $next($request);
        }

        // Jika bukan admin, tendang ke dashboard dengan pesan error
        return redirect('/dashboard')->with('error', 'Anda tidak punya akses admin.');
    }
}
