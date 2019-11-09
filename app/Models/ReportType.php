<?php

namespace App\Models;

use App\Returners\NameReturner;
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
       $name = new NameReturner($this);

       return $name->getNameByLocale();
    }
}
