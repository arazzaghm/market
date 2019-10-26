<?php

namespace App\Http\Requests\Report;

use App\Http\Requests\BaseRequest;
use Illuminate\Foundation\Http\FormRequest;

class CreateReportRequest extends BaseRequest
{

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'model_type' => 'required',
            'model_id' => 'required',
            'type_id' => 'required',
            'title' => 'required',
            'description' => 'required',
        ];
    }
}
