<?php

namespace App\Formatters;

class UserNameFormatter implements Formatter
{
    private $name;

    private $prefix;

    public function __construct($name, $prefix)
    {
        $this->name = $name;

        $this->prefix = $prefix;
    }

    public function format()
    {
        return $this->prefix ? "[$this->prefix] " . $this->name : $this->name;
    }
}
