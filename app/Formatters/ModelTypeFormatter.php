<?php

namespace App\Formatters;

class ModelTypeFormatter implements Formatter
{
    private $modelType;

    public function __construct($modelType)
    {
        $this->modelType = $modelType;
    }

    public function format()
    {
        $explodedModelType = explode('\\',$this->modelType);

        return end($explodedModelType);
    }
}
