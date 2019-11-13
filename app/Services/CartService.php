<?php

namespace App\Services;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;
use App\Models\Post;

class CartService
{
    /**
     * Adds post to current cart via session.
     *
     * @param Request $request
     * @param Post $post
     */
    public function addPost(Request $request, Post $post)
    {
        if (!in_array($post->id, $request->session()->get('posts') ?? [])) {
            $request->session()->push('posts', $post->id);
        }
    }

    /**
     * Gets posts.
     *
     * @param Request $request
     * @return Builder[]|Collection|null
     */
    public function getPosts(Request $request)
    {
        if ($request->session()->get('posts') != null) {
            $posts = Post::whereIn('id', $request->session()->get('posts'))->get();
        } else {
            $posts = new Collection();
        }

        return $posts;
    }

    /**
     * Deletes post from cart.
     *
     * @param Request $request
     * @param Post $post
     */
    public function deletePost(Request $request, Post $post)
    {
        if (in_array($post->id, $request->session()->get('posts'))) {
            $postPosition = array_search($post->id, $request->session()->get('posts'));
            $request->session()->forget('posts.' . $postPosition);
        }
    }
}
