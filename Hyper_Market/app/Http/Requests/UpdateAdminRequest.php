<?php

namespace App\Http\Requests;

use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class UpdateAdminRequest extends FormRequest
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
            'phone' => ['required', 'numeric',  Rule::unique('admins')->ignore(request()->route('id')), 'regex:/^01[0125][0-9]{8}$/'],
            'image' => ['max:1024', 'mimes:png,jpg,jpeg'],
        ];
    }
}
