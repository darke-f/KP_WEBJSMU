<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

class stockperm
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
        if (Auth::check() && ( Auth::user()->level == 'admin' || Auth::user()->stockperm == '1') ) {
            return $next($request);
        }
        else {
            return redirect()->back()->with('err', 'You don\'t have permission'); 
        }
    }
}
