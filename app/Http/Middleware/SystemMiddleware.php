<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class SystemMiddleware
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
        if (!auth()->user()->user_type == 'system') {
            auth()->logout();
            return redirect()->route('get.login')->with('warning', 'You were unauthorised!');
        }

        return $next($request);
    }
}
