<?php

namespace App\Formatters;

use App\Interfaces\Formatter;

class FlagIconPathFormatter implements Formatter
{
    private $path = 'img/flags/';
    private $locale;
    private $extension = '.png';

    /**
     * FlagIconPathFormatter constructor.
     * @param $locale
     */
    public function __construct($locale)
    {
        $this->locale = $locale;
    }

    /**
     * Formats the flag icon path.
     *
     * @return mixed|string
     */
    public function format()
    {
        return asset($this->path . $this->locale . $this->extension);
    }
}
