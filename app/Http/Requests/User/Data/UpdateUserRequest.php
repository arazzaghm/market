<?php

namespace App\Http\Requests\User\Data;

use App\Http\Requests\BaseRequest;

class UpdateUserRequest extends BaseRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $rules = [
            'name' => 'required',
            'email' => 'email|required|unique:users,email, ' . auth()->id(),
        ];

        if ($this->old_password && $this->password) {
            $passwordRules = [
                'old_password' => 'required|min:6',
                'password' => 'required|min:6',
            ];

            $rules = array_merge($rules, $passwordRules);
        }

        return $rules;
    }
}
