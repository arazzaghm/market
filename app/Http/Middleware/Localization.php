<?php

namespace App\Http\Middleware;

use App\Classes\Language;
use Closure;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Config;

class Localization
{
    /**
     * Handle an incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Closure $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if (Session::has('locale') && in_array(Session::get('locale'), Language::get())) {
            App::setLocale(Session::get('locale'));
        }
        if (Session::get('locale') == null) {
            Session::put('locale', 'en');
            App::setLocale('en');
        }
        return $next($request);
    }
}
