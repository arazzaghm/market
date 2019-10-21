<?php

namespace App\Formatters;

use Carbon\Carbon;

class PostDateFormatter implements Formatter
{
    private $date;

    public function __construct($date)
    {
        $this->date = $date;
    }

    public function format()
    {
        $date = new Carbon($this->date);

        return $date->isoFormat('MMMM Do YYYY, h:mm');
    }
}
