<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Services\BookmarkService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BookmarkController extends Controller
{
    private $bookmarkService;

    public function __construct()
    {
        $this->bookmarkService = new BookmarkService();
    }

    public function index()
    {
        $bookmarks = Auth::user()->bookmarks()->paginate(10);

        return view('pages.bookmarks.index', compact('bookmarks'));
    }

    public function store(Post $post)
    {
        $this->bookmarkService->handlePost($post);

        return back();
    }
}
