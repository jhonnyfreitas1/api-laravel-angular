<?php

namespace App\Http\Middleware;
use Closure;

class CheckLogin
{
    public function handle($request, Closure $next)
    {
        if (!session()->has('logado')){
            return redirect()->route('login');
        }else{
            return $next($request);
        }
    }
}
