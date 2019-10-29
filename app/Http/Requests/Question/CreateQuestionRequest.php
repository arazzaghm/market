<?php

namespace App\Http\Requests\Question;

use App\Http\Requests\BaseRequest;
use Illuminate\Foundation\Http\FormRequest;

class CreateQuestionRequest extends BaseRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'title' => 'required',
            'text' => 'required',
        ];
    }
}
