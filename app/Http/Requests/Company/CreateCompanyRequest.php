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
            'description' => 'required'
        ];
    }
}
