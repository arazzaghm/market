<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ReportType extends Model
{
    public $timestamps = false;

    public function reports()
    {
        return $this->hasMany(Report::class);
    }
}
