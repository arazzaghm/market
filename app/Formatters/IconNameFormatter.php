<?php

namespace App\Formatters;

class IconNameFormatter implements Formatter
{
    private $iconName;

    /**
     * IconNameFormatter constructor.
     * @param $iconName
     */
    public function __construct($iconName)
    {
        $this->iconName = $iconName;
    }

    /**
     * Formats icon name.
     *
     * @return mixed|string
     */
    public function format()
    {
        return 'fa-' . $this->iconName;
    }
}
