<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AirportUpdateRequest extends FormRequest
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
            'name' => ['required', 'string', 'max:100'],
            'country_id' => ['required', 'integer', 'exists:countries,id'],
            'deleted_at' => ['nullable'],
        ];
    }
}
