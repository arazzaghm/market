<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MyCompanyPostController extends Controller
{
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
