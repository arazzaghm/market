<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;

class LogoutController extends Controller
{
    public function logout(Request $request)
    {
        Cache::forget('user-online-' . Auth::id());
        Auth::logout();
        return redirect()->route('home');
    }
}
