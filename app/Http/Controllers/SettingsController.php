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
        $totalPosts = Auth::user()->posts()->count();

        $totalReports = Auth::user()->createdReports()->count();

        $totalQuestions = Auth::user()->questions()->count();

        $totalPostsViews = Auth::user()->posts()->sum('viewed_times');

        $theMostPopularPost = Auth::user()->popularPosts()->first();

        $totalArchivedPosts = Auth::user()->archivedPosts()->count();

        $totalHiddenPosts = Auth::user()->hiddenPosts()->count();

        return view('pages.settings.statistics', compact(
            'totalPosts',
            'totalQuestions',
            'totalReports',
            'totalPostsViews',
            'theMostPopularPost',
            'totalArchivedPosts',
            'totalHiddenPosts'
        ));
    }

    public function support()
    {

    }
}
