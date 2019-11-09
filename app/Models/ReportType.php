<?php

namespace App\Models;

use App\Returners\NameReturner;
use App\Traits\FormatModelTypeTrait;
use App\Traits\NameGetterTrait;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Facades\App;

class ReportType extends Model
{
    use FormatModelTypeTrait, NameGetterTrait;

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
}
