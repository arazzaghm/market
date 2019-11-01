<?php

namespace App\Traits;

use App\Formatters\ModelTypeFormatter;

trait FormatModelTypeTrait
{
    /**
     * Formats model type name.
     *
     * @return string
     */
    public function getFormattedModelType(): string
    {
        $modelType = new ModelTypeFormatter($this->model_type);

        return $modelType->format();
    }
}
