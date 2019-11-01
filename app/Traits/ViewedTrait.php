<?php

namespace App\Traits;

trait ViewedTrait
{
    /**
     * Checks if object is viewed.
     *
     * @return bool
     */
    public function isViewed(): bool
    {
        return $this->is_viewed == true;
    }

    /**
     * Checks if object is not viewed.
     *
     * @return bool
     */
    public function isNotViewed(): bool
    {
        return !$this->isViewed() ? true : false;
    }

    /**
     * Makes object viewed.
     */
    public function makeViewed()
    {
        $this->update(['is_viewed' => true]);
    }

    /**
     * Makes object not viewed.
     */
    public function makeNotViewed()
    {
        $this->update(['is_viewed' => false]);
    }

    /**
     * Builds query with not viewed records.
     *
     * @return mixed
     */
    public static function notViewed()
    {
        return self::where('is_viewed', false);
    }

    /**
     * Counts not viewed records in DB.
     *
     * @return mixed
     */
    public static function countNotViewed()
    {
        return self::notViewed()->count();
    }
}
