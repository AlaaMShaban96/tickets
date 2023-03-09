<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TicketUpdateRequest extends FormRequest
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
            'trip_id' => ['required', 'integer', 'exists:trips,id'],
            'type' => ['required', 'in:one_way,return'],
            'adults_number' => ['required', 'string'],
            'children_number' => ['required', 'string'],
            'passport_photo' => ['required', 'string'],
            'visa_photo' => ['nullable', 'string'],
            'deleted_at' => ['nullable'],
        ];
    }
}
