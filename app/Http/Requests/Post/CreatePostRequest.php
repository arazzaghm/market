<?php

namespace App\Http\Requests\Post;

use App\Http\Requests\BaseRequest;

class CreatePostRequest extends BaseRequest
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
            'description' => 'required',
            'price' => 'required|numeric',
            'location' => 'required',
            'category_id' => 'required|exists:categories,id',
            'picture' => 'nullable|image:png,jpeg,jpg,bmp'
        ];
    }
}
