<?php

namespace App\Http\Requests\V1;

use Illuminate\Foundation\Http\FormRequest;

class ConvertRequest extends FormRequest
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
            'to' => 'required|bail|alpha_num|max:3',
            'from' => 'sometimes|bail|alpha_num|max:3',
            'amount' => 'sometimes|bail|numeric',
            'locale' => 'sometimes|required|alpha_dash',
        ];
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'to.max' => 'The `to` field must contain an ISO Currency Code. For example: EUR',
            'from.max' => 'The `from` field must contain an ISO Currency Code. For example: USD',
            'amount.numeric' => 'Enter a valid amount. For example: 123.45'
        ];
    }

    public function prepareForValidation()
    {
        $this->merge([
            'from' => strtoupper($this->from),
            'to' => strtoupper($this->to),
        ]);
    }
}
