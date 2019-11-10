<?php

namespace App\Services;

use App\Models\Post;

class BookmarkService
{
    /**
     * Handles post.
     *
     * @param Post $post
     */
    public function handlePost(Post $post)
    {
        if ($post->isInBookmarks()) {
            $post->removeFromBookmarks();
        } else {
            $post->addToBookmarks();
        }
    }
}
