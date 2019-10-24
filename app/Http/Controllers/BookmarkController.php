<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BookmarkController extends Controller
{
    public function index()
    {
        $bookmarks = Auth::user()->bookmarks()->with('Post')->paginate(10);

        return view('pages.bookmarks.index', compact('bookmarks'));
    }

    public function store(Post $post)
    {
        if ($post->isInBookmarks()) {
            $post->bookmarks()->where('user_id', Auth::id())->delete();
        } else {
            Auth::user()->bookmarks()->create(['post_id' => $post->id]);
        }
        return back();
    }
}