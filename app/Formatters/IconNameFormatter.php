<?php

namespace App\Formatters;

class IconNameFormatter implements Formatter
{
    private $iconName;

    public function __construct($iconName)
    {
        $this->iconName = $iconName;
    }

    public function format()
    {
        return 'fa-' . $this->iconName;
    }
}
