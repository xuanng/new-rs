<?php

namespace RS\Http\Requests;

use RS\Http\Requests\Request;

class CatalogRequest extends Request
{
    public function authorize()
    {
        return true;
    }
    public function rules()
    {
        return [
            'name' => 'required',
            'price' => 'required',
            'category' => 'required',
        ];
    }
}
