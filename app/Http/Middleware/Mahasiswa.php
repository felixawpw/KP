<?php

namespace App\Http\Middleware;

use Closure;
use Auth;
class Mahasiswa
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
            return redirect()->route('login')->with('status', '0;Anda belum login');
        else if(Auth::user()->mahasiswa == "")
            return redirect()->route('login')->with('status', '0;Anda tidak dapat login sebagai mahasiswa.');
        return $next($request);
    }
}
