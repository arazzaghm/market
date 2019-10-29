<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function index(Request $request)
    {
        if ($request->title == null) {
            return back();
        }
        $posts = Post::where('title', 'like', '%' . $request->title . '%')
            ->where('status', Post::STATUS_VISIBLE)
            ->get();

        return view('pages.posts.index', compact('posts'));
    }
}
