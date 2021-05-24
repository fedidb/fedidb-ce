<?php

namespace App\Http\Middleware;

use Closure;

class BetaMiddleware
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
        if(!$request->session()->has('beta_check') && !$request->is(
            'about',
            'actor/*',
            'beta/checkpoint',
            'rb/*',
            '/',
            'news'
        )) {
            return redirect('/beta/checkpoint');
        }
        return $next($request);
    }
}
