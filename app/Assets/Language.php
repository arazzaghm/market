<?php

namespace App\Assets;

use App\Formatters\IconPathFormatter;
use Illuminate\Support\Facades\Session;

class Language
{
    const ENGLISH = 'English';
    const UKRAINIAN = 'Ukrainian';
    const RUSSIAN = 'Russian';

    private static $languages = [
        self::ENGLISH => 'en',
        self::UKRAINIAN => 'uk',
        self::RUSSIAN => 'ru',
    ];

    public static function get(string $key = null)
    {
        if ($key != null) {
            return self::$languages[$key];
        } else {
            return self::$languages;
        }
    }

    public static function getIconUrl($locale): string
    {
        $flag = new IconPathFormatter($locale);

        return $flag->format();
    }

    public static function getCurrent()
    {
        return Session::get('locale');
    }

    public static function getName($locale)
    {
        return array_search($locale, self::$languages);
    }
}
