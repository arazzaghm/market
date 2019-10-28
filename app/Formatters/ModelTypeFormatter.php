<?php

namespace App\Formatters;

class ModelTypeFormatter implements Formatter
{
    private $modelType;

    /**
     * ModelTypeFormatter constructor.
     * @param $modelType
     */
    public function __construct($modelType)
    {
        $this->modelType = $modelType;
    }

    /**
     * Formats model type.
     *
     * @return mixed
     */
    public function format()
    {
        $explodedModelType = explode('\\', $this->modelType);

        return end($explodedModelType);
    }
}
