<?php

namespace App\Traits;

use App\Formatters\DateFormatter;

trait FormatCreatedAdDateTrait
{
    /**
     * Formats created at date.
     *
     * @return mixed|string
     * @throws \Exception
     */
    public function formatCreatedAtDate()
    {
        $date = new DateFormatter($this->created_at);

        return $date->format();
    }
}
