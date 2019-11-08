<?php

namespace App\Models;

use App\Traits\FormatModelTypeTrait;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Facades\App;

class ReportType extends Model
{
    use FormatModelTypeTrait;

    public $timestamps = false;

    protected $fillable = [
        'name',
        'name_uk',
        'name_ru',
        'model_type'
    ];

    /**
     * Reports.
     *
     * @return HasMany
     */
    public function reports()
    {
        return $this->hasMany(Report::class);
    }

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
