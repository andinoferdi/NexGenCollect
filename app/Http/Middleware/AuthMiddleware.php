<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthMiddleware
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
        if (Auth::check()) {
            if (in_array(Auth::id(), [1, 3])) {
                return $next($request);
            } else {
                return redirect()->route('userpage');
            }
        }
        return redirect()->route('login');
    }
}
