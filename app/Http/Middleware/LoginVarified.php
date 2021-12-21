<?php

namespace App\Http\Middleware;
use Illuminate\Support\Facades\Auth;

use Closure;

class LoginVarified
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
        if (Auth::check() ) {
            if(Auth::user()->email_verified_at==null){
                return redirect('/verify-email');
            }
        }

        return $next($request);
    }
}