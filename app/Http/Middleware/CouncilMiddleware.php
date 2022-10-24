<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class CouncilMiddleware
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
        if (auth()->user()->user_type != 'council') {
            auth()->logout();
            return redirect()->route('get.login')->with('warning', 'You were unauthorised!');
        }

        return $next($request);
    }
}
