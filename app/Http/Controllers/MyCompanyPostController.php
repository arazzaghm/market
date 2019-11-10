<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class MyCompanyPostController extends Controller
{
    /**
     * Shows posts.
     *
     * @return Factory|View
     */
    public function index()
    {
        $posts = Auth::user()
            ->company
            ->posts()
            ->latest()
            ->paginate(20);

        return view('pages.my-company.posts.index', compact('posts'));
    }
}
