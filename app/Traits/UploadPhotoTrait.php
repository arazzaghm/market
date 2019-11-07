<?php

namespace App\Traits;

trait UploadPhotoTrait
{
    public function upload($photo, string $collection)
    {
        if ($this->object->hasMedia($collection) && isset($photo)) {
            $this->object->getFirstMedia($collection)->delete();
            $this->object->addMedia($photo)->toMediaCollection($collection);
        } elseif (isset($photo)) {
            $this->object->addMedia($photo)->toMediaCollection($collection);
        }
    }
}
