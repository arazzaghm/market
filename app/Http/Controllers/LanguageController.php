<?php

namespace App\Http\Controllers;

use App\Assets\Language;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;

class LanguageController extends Controller
{
    public function set($locale)
    {
        if (in_array($locale, Language::get())) {
            Session::put('locale', $locale);
        }

        return back();
    }
}
