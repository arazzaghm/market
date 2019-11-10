<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Services\SearchService;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\Request;
use Illuminate\View\View;

class SearchController extends Controller
{
    private $searchService;

    /**
     * SearchController constructor.
     */
    public function __construct()
    {
        $this->searchService = new SearchService();
    }

    /**
     * Search posts index.
     *
     * @param Request $request
     * @return Factory|View
     */
    public function index(Request $request)
    {
        $posts = $this->searchService->findPosts($request);

        return view('pages.posts.index', compact('posts'));
    }
}
