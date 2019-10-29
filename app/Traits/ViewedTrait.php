<?php

namespace App\Traits;

trait ViewedTrait
{
    public function isViewed()
    {
        return $this->is_viewed == true;
    }

    public function isNotViewed()
    {
        return !$this->isViewed() ? true : false;
    }

    public function makeViewed()
    {
        $this->update(['is_viewed' => true]);
    }

    public function makeNotViewed()
    {
        $this->update(['is_viewed' => false]);
    }

    public static function notViewed()
    {
        return self::where('is_viewed', false);
    }

    public static function countNotViewed()
    {
        return self::notViewed()->count();
    }
}
