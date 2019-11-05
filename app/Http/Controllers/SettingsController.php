<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SettingsController extends Controller
{
    public function index()
    {
        return view('pages.settings.index');
    }

    public function statistics()
    {

        $totalReports = Auth::user()->createdReports()->count();

        $totalQuestions = Auth::user()->questions()->count();

        return view('pages.settings.statistics', compact(
            'totalReports',
            'totalQuestions'
        ));
    }

    public function support()
    {

    }
}
