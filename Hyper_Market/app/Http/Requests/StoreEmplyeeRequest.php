<?php

namespace App\Http\Requests;

use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class StoreEmplyeeRequest extends FormRequest
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
            'name_en' => ['required', 'string', 'between:3,255'],
            'email'=>['required','regex:/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/'],
            'password'=>['required','regex:/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,20}$/'],
            'salary' => ['required', 'numeric', 'max:999999.99', 'min:0.5'],
            'phone' => ['required', 'numeric',  'unique:employees,phone', 'regex:/^01[0125][0-9]{8}$/'],
            'type' => ['required', 'string', Rule::in([0,1])],
            'image' => [ 'max:1024', 'mimes:png,jpg,jpeg'],

        ];
    }
}
