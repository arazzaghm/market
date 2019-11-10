<?php

namespace App\Services;

use App\Models\Post;

class CommentService
{
    /**
     * Creates comment
     *
     * @param Post $post
     * @param array $data
     * @param null $anonymous
     */
    public function createComment(Post $post, array $data, $anonymous = null)
    {
        $data['user_id'] = auth()->id();

        if ($anonymous) {
            $data['anonymous'] = true;
        } else {
            $data['anonymous'] = false;
        }

        $post->comments()->create($data);
    }
}
