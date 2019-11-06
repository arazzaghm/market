<?php

namespace App\Formatters;

use App\Interfaces\Formatter;

class IconPathFormatter implements Formatter
{
    private $path = 'img/flags/';
    private $locale;
    private $extension = '.png';

    public function __construct($locale)
    {
        $this->locale = $locale;
    }

    public function format()
    {
        return asset($this->path . $this->locale . $this->extension);
    }
}
