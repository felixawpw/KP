<?php

namespace App\Http\Middleware;

use Closure;
use Auth;
class Admin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if (!Auth::check())
            return redirect()->route('loginAdmin')->with('status', '0;Akses Website Gagal;Anda belum login');
        else if(Auth::user()->panitia()->count() == 0)
            return redirect()->route('loginAdmin')->with('status', '0;Akses Website Gagal;Anda belum login');
        return $next($request);
    }
}
