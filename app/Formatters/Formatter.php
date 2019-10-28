<?php

namespace App\Formatters;

interface Formatter
{
    /**
     * Method that formats the data.
     *
     * @return mixed
     */
    public function format();
}
