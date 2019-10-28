<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SettingsController extends Controller
{
    public function index()
    {
        return view('pages.settings.index');
    }

    public function statistics()
    {
        return view('pages.settings.statistics');
    }
}
