<?php

namespace App\Http\Middleware;

use Closure;

class HasCompany
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
        abort_if(! $request->user() || (! $request->user()->hasCompany()), 404);

        return $next($request);
    }
}
