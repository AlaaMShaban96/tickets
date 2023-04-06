<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TripUpdateRequest extends FormRequest
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
            'name' => ['required', 'string'],
            'plane_id' => ['required', 'integer', 'exists:planes,id'],
            'from_airport_id' => ['required', 'integer', 'exists:airports,id'],
            'to_airport_id' => ['required', 'integer', 'exists:airports,id'],
            'take_off_at' => ['required'],
            'airline_id' => ['required'],
            'landing_at' => ['required'],
            'adults_price' => ['required', 'numeric'],
            'children_price' => ['nullable', 'numeric'],
            'need_visa' => ['required'],
            'available' => ['nullable'],
            'poilcy' => ['nullable'],

        ];
    }
}
