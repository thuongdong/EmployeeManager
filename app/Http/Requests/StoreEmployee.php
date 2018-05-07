<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreEmployee extends FormRequest
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
            //
            'email'=>'required|email|unique:employees|regex:/[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,6}/',
            'avatar'=>'image'
        ];
    }

    public function messages()
    {
        return [
            'email.unique' => 'Email has already been taken',
            'email.regex'=>'Email: format is invalid',
            'email.required'=>'Email field is required',
            'email.email'=>'Email must be a valid email address',
            'avatar.image' => 'Avatar must be an image',
        ];
    }
}
