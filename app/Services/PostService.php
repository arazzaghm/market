<?php

namespace App\Services;

use App\Models\Post;
use App\Traits\UploadPhotoTrait;

class PostService
{
    use UploadPhotoTrait;

    private $object;

    public function handleUploadedPhoto(Post $post, $photo)
    {
        $this->object = $post;

        $this->upload($photo, 'picture');
    }
}
