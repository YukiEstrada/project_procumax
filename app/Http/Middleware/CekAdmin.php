<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class CekAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if($request->session()->has('username','role')){
            return $next($request);
		}else{
			return redirect()->route('login_show')
            ->withErrors(['Account login Failed!']);
		}
        
    }
}
