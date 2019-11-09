<?php

namespace App\Formatters;

use App\Interfaces\Formatter;

class PhoneNumberFormatter implements Formatter
{
    private $phoneNumber;

    /**
     * PhoneNumberFormatter constructor.
     * @param $phoneNumber
     */
    public function __construct($phoneNumber)
    {
        $this->phoneNumber = $phoneNumber;
    }

    /**
     * Formats phone number.
     *
     * @return mixed|string|string[]|null
     */
    public function format()
    {
        $this->phoneNumber = preg_replace('/[^0-9]/', '', $this->phoneNumber);
        if (strlen($this->phoneNumber) > 10) {
            $countryCode = substr($this->phoneNumber, 0, strlen($this->phoneNumber) - 10);
            $areaCode = substr($this->phoneNumber, -10, 3);
            $nextThree = substr($this->phoneNumber, -7, 3);
            $lastFour = substr($this->phoneNumber, -4, 4);
            return '+' . $countryCode . ' (' . $areaCode . ') ' . $nextThree . '-' . $lastFour;
        }
        if (strlen($this->phoneNumber) == 10) {
            $areaCode = substr($this->phoneNumber, 0, 3);
            $nextThree = substr($this->phoneNumber, 3, 3);
            $lastFour = substr($this->phoneNumber, 6, 4);
            return $this->phoneNumber = '(' . $areaCode . ') ' . $nextThree . '-' . $lastFour;
        }
        return $this->phoneNumber;
    }
}
