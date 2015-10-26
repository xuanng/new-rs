<?php

namespace RS\Http\Requests;

use RS\Http\Requests\Request;

class LoginRequest extends Request
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required|exists:users,name|is_active:users,status',
            'password' => 'required',
        ];
    }

    public function messages()
    {
        return array(
            'name.required' => 'User Name is Required',
            'name.exists' => 'User Name is not exists in our system',
            'name.is_active' => 'User Name is not active in our system',
            'password.required' => 'Password is Required',
        );
    }
}
