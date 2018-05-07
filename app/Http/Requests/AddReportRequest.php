<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AddReportRequest extends FormRequest
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
            'todayContent'=> 'max:256|min:6',
            'tomorrowContent'=> 'max:256|min:6',
            'problem'=> 'max:256|min:6',
        ];
    }
}
