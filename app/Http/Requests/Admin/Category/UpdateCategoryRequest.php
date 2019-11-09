<?php

namespace App\Http\Requests\Admin\Category;

use App\Http\Requests\BaseRequest;

class UpdateCategoryRequest extends BaseRequest
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
            'name_uk' => 'required',
            'name_ru' => 'required',
            'icon_name' => 'required',
        ];
    }
}
