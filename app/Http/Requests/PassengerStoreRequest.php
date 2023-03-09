<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PassengerStoreRequest extends FormRequest
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
            'ticket_id' => ['required', 'integer', 'exists:tickets,id'],
            'name' => ['required', 'string'],
            'last_name' => ['required', 'string'],
            'gender' => ['required', 'in:male,female'],
            'nationality' => ['required', 'string'],
            'place_of_birth' => ['required', 'string'],
            'birth_date' => ['required', 'date'],
            'mobile_number' => ['required', 'string'],
            'emile' => ['required', 'string'],
            'passport_number' => ['required', 'string', 'max:25'],
            'passport_expiry_date' => ['required', 'date'],
            'deleted_at' => ['nullable'],
        ];
    }
}
