<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Guru
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        if(Auth::user()->role == 'guru'){
            return $next($request);
        }elseif(Auth::user()->role == 'kurikulum' ){
            return redirect()->route('kurikulum');
        }elseif(Auth::user()->role == 'kepsek'){
            return redirect()->route('kepsek');
        }
    }
}
