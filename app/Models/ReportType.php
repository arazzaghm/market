<?php

namespace App\Models;

use App\Traits\FormatModelTypeTrait;
use Illuminate\Database\Eloquent\Model;

class ReportType extends Model
{
    use FormatModelTypeTrait;

    public $timestamps = false;

    protected $fillable = ['name', 'model_type'];

    public function reports()
    {
        return $this->hasMany(Report::class);
    }
}
