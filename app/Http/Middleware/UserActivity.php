<?php

namespace App\Http\Middleware;

use Carbon\Carbon;
use Closure;
use Illuminate\Support\Facades\Cache;

class UserActivity
{
    /**
     * Handle an incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Closure $next
     * @return mixed
     */
    /**
     * Handle an incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Closure $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if (auth()->check()) {
            if (Cache::has('user-online-' . auth()->id())) {
               Cache::forget('user-online-' . auth()->id());
            }
            Cache::put('user-online-' . auth()->id(), true, Carbon::now()->addMinutes(4));
        }
        return $next($request);
    }
}
