<?php

namespace App\Http\Requests\Company;

use App\Http\Requests\BaseRequest;

class CreateCompanyRequest extends BaseRequest
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
            'email' => 'email|required|unique:companies,email',
            'phone' => 'required|numeric',
            'description' => 'required',
            'logo' => 'required|image|mimes:jpeg,jpg,png,bmp|dimensions:min_width=100,min_height=100,max_width=500,max_height=500'
        ];
    }
}
