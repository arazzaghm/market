<?php


namespace App\Traits;


use App\Returners\NameReturner;

trait NameGetterTrait
{
    /**
     * Returns name by locale.
     *
     * @return mixed
     */
    public function getNameByLocale()
    {
        $name = new NameReturner($this);

        return $name->getNameByLocale();
    }
}
