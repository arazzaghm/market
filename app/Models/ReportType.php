<?php

namespace App\Models;

use App\Traits\FormatModelTypeTrait;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class ReportType extends Model
{
    use FormatModelTypeTrait;

    public $timestamps = false;

    protected $fillable = ['name', 'model_type'];

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
