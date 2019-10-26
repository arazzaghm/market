<?php

namespace App\Assets;

use App\Models\Post;
use App\Models\User;

class ReportableModels
{
    private static $models = [
        'Post' => Post::class,
        'User' => User::class,
    ];

    /**
     * @return array
     */
    public static function get(): array
    {
        return self::$models;
    }
}
