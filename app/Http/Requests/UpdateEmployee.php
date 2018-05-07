<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateEmployee extends FormRequest
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
            'avatar'=>'image',
            'repeatpassword'=>'same:password'
        ];
    }

    public function messages()
    {
        return [
            'avatar.image' => 'The :attribute must be an image',
            'repeatpassword.same' => 'The :attribute and :other must match',
        ];
    }
}
