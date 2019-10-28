<?php

namespace App\Traits;

use App\Formatters\ModelTypeFormatter;

trait FormatModelTypeTrait
{
    public function getFormattedModelType(): string
    {
        $modelType = new ModelTypeFormatter($this->model_type);

        return $modelType->format();
    }
}
