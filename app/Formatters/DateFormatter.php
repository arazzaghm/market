<?php

namespace App\Formatters;

use Carbon\Carbon;

class DateFormatter implements Formatter
{
    private $date;

    /**
     * DateFormatter constructor.
     * @param $date
     */
    public function __construct($date)
    {
        $this->date = $date;
    }

    /**
     * Formats date.
     *
     * @return mixed|string
     * @throws \Exception
     */
    public function format()
    {
        $date = new Carbon($this->date);

        return $date->isoFormat('MMMM Do YYYY, h:mm');
    }
}
