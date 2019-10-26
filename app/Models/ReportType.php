<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ReportType extends Model
{
    public $timestamps = false;

    protected $fillable = ['name', 'model_type'];

    public function reports()
    {
        return $this->hasMany(Report::class);
    }
}
