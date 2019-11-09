<?php

namespace App\Returners;

use Illuminate\Support\Facades\App;

class NameReturner
{
    private $object;

    public function __construct($object)
    {
        $this->object = $object;
    }

    public function getNameByLocale()
    {
        $name = $this->object->name;

        if (App::getLocale() == 'ru') {
            $name = $this->object->name_ru;
        } elseif (App::getLocale() == 'uk') {
            $name = $this->object->name_uk;
        }

        return $name;
    }
}
