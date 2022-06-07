<?php

namespace App\Http\Requests;

use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class UpdateUserProfileRequest extends FormRequest
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
            'name' => ['required', 'string', 'between:3,255'],
            'phone' => ['required', 'numeric',  Rule::unique('users')->ignore(request()->route('id')), 'regex:/^01[0125][0-9]{8}$/'],
            'image' => ['max:1024', 'mimes:png,jpg,jpeg'],
        ];
    }
}
