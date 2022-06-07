<?php

namespace App\Http\Requests;

use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class UpdateOfferRequest extends FormRequest
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
            'title' => ['required',Rule::unique('offers')->ignore(request()->route('id')), 'string', 'between:3,255'],
            'product_id' => ['nullable', 'integer', 'exists:products,id'],
            'discount' => ['required', 'numeric', 'max:999999.99', 'min:0.5'],
            'discount_type' => ['nullable', 'integer', Rule::in([0, 1])],
            'start_date' => ['required', 'date'],
            'end_date' => ['nullable', 'date', 'after_or_equal:start_date'],

        ];
    }
}
