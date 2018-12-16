<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class Partner
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \Closure $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if (Auth::user()->provider) {
            return $next($request);
        }

        return redirect()->route('register-partner')->with(['warning' => 'Kamu Belum Terdaftar Menjadi Partner']);

    }
}
