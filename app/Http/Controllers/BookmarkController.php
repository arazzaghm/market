<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Services\BookmarkService;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class BookmarkController extends Controller
{
    private $bookmarkService;

    /**
     * BookmarkController constructor.
     */
    public function __construct()
    {
        $this->bookmarkService = new BookmarkService();
    }

    /**
     * Shows all bookmarks for auth.
     *
     * @return Factory|View
     */
    public function index()
    {
        $bookmarks = Auth::user()->bookmarks()->paginate(10);

        return view('pages.bookmarks.index', compact('bookmarks'));
    }

    /**
     * Stores the bookmark.
     *
     * @param Post $post
     * @return RedirectResponse
     */
    public function store(Post $post)
    {
        $this->bookmarkService->handlePost($post);

        return back();
    }
}
