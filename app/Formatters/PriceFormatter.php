<?php

namespace App\Formatters;

use App\Interfaces\Formatter;

class PriceFormatter implements Formatter
{
    private $amount;
    private $currency;

    /**
     * PriceFormatter constructor.
     * @param $amount
     * @param $currency
     */
    public function __construct($amount, $currency)
    {
        $this->currency = $currency;
        $this->amount = $amount;
    }

    /**
     * Formats full price.
     *
     * @return string
     */
    public function format(): string
    {
        return $this->amount . ' ' . $this->currency;
    }
}
