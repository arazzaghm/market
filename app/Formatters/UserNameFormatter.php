<?php

namespace App\Formatters;

class UserNameFormatter implements Formatter
{
    private $name;

    private $prefix;

    /**
     * UserNameFormatter constructor.
     * @param $name
     * @param $prefix
     */
    public function __construct($name, $prefix)
    {
        $this->name = $name;

        $this->prefix = $prefix;
    }

    /**
     * Formats user name.
     *
     * @return mixed|string
     */
    public function format()
    {
        return $this->prefix ? "[$this->prefix] " . $this->name : $this->name;
    }
}
