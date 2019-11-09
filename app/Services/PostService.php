<?php

namespace App\Services;

use App\Models\Post;
use App\Traits\UploadPhotoTrait;

class PostService
{
    use UploadPhotoTrait;

    private $object;

    /**
     * Handles uploaded photo.
     *
     * @param Post $post
     * @param $photo
     */
    public function handleUploadedPhoto(Post $post, $photo)
    {
        $this->object = $post;

        $this->upload($photo, 'picture');
    }
}
