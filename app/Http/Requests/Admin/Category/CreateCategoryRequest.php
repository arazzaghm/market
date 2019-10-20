<?php

namespace App\Http\Requests\Admin\Category;

use App\Http\Requests\BaseRequest;

class CreateCategoryRequest extends BaseRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required',
            'icon_name' => 'required',
        ];
    }
}
