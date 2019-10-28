<?php

namespace App\Traits;

use App\Models\ReportType;

trait ReportableTrait
{
    public function reportTypes()
    {
        return ReportType::where('model_type', self::class);
    }
}
