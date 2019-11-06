<?php

namespace App\Formatters;

use App\Interfaces\Formatter;

class PriceFormatter implements Formatter
{
    private $amount;
    private $currency;

    public function __construct($amount, $currency)
    {
        $this->currency = $currency;
        $this->amount = $amount;
    }

    public function format(): string
    {
        return $this->amount . ' ' . $this->currency;
    }
}
