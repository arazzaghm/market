<?php

namespace App\Http\Controllers;

use App\Classes\Language;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;

class LanguageController extends Controller
{
    /**
     * Sets the locale.
     *
     * @param $locale
     * @return RedirectResponse
     */
    public function set($locale)
    {
        if (in_array($locale, Language::get())) {
            Session::put('locale', $locale);
        }

        return back();
    }
}
