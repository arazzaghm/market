<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\View\Factory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class SettingsController extends Controller
{
    /**
     * Shows index page.
     *
     * @return Factory|View
     */
    public function index()
    {
        return view('pages.settings.index');
    }

    /**
     * Shows statistics page.
     *
     * @return Factory|View
     */
    public function statistics()
    {

        $totalReports = Auth::user()->createdReports()->count();

        $totalQuestions = Auth::user()->questions()->count();

        return view('pages.settings.statistics', compact(
            'totalReports',
            'totalQuestions'
        ));
    }
}
