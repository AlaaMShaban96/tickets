<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TicketStoreRequest extends FormRequest
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
            'numberOfPassengers' => ['required'],
            'numberOfChildren' => ['required'],
            'journey_date' => ['required'],
            'numberOfAdult' => ['required'],
            'passengers.*.name' => ['required'],
            'passengers.*.last_name' => ['required'],
            'passengers.*.email' => ['required'],
            'passengers.*.mobile_number' => ['required'],
            'passengers.*.nationality' => ['required'],
            'passengers.*.birth_date' => ['required'],
            'passengers.*.passport_number' => ['required'],
            'passengers.*.passport_expiry_date' => ['required'],
            'passengers.*.passport_photo' => ['required'],
        ];
    }
}
