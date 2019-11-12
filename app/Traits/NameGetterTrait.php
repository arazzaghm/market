<?php


namespace App\Traits;


use App\Returners\NameReturner;
use Illuminate\Support\Facades\App;

trait NameGetterTrait
{
    /**
     * Returns name by locale.
     *
     * @return mixed
     */
    public function getNameByLocale()
    {
        $name = $this->name;

        if (App::getLocale() == 'ru') {
            $name = $this->name_ru;
        } elseif (App::getLocale() == 'uk') {
            $name = $this->name_uk;
        }

        return $name;
    }
}
