<?php

namespace App\Traits;

use App\Models\ReportType;

trait ReportableTrait
{
    /**
     * Report types.
     *
     * @return mixed
     */
    public function reportTypes()
    {
        return ReportType::where('model_type', self::class);
    }
}
