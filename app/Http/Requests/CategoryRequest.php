<?php

namespace RS\Http\Requests;

use RS\Http\Requests\Request;

class CategoryRequest extends Request
{
    public function authorize()
    {
        return true;
    }
    public function rules()
    {
        return [
            'name' => 'required',
        ];
    }
}
