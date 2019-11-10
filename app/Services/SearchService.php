<?php

namespace App\Services;

use App\Models\Post;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class SearchService
{
    /**
     * Finds posts
     *
     * @param Request $request
     * @return RedirectResponse
     */
    public function findPosts(Request $request)
    {
        if ($request->title == null) {
            return back();
        }

        $posts = Post::where('title', 'like', '%' . $request->title . '%')
            ->where('status', Post::STATUS_VISIBLE)
            ->paginate(10);

        return $posts;
    }
}
