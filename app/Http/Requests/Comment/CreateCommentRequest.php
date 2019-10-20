<?php

namespace App\Http\Comment;

use App\Http\Requests\BaseRequest;

class CreateCommentRequest extends BaseRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'text' => 'required',
            'anonymous' => 'nullable',
        ];
    }
}
