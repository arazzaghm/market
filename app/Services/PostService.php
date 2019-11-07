<?php

namespace App\Services;

use App\Models\Post;

class PostService
{
    public function handleUploadedPhoto(Post $post, $photo)
    {
        if ($post->hasMedia('picture') && isset($photo)) {
            $post->getFirstMedia('picture')->delete();
            $post->addMedia($photo)->toMediaCollection('picture');
        } elseif (isset($photo)) {
            $post->addMedia($photo)->toMediaCollection('picture');
        }
    }
}
