<?php

namespace App\Http\Requests\rooms;

use Illuminate\Foundation\Http\FormRequest;

class BookRoomRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'required|string|max:255',
            'phone' => 'required|string|max:255',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after:start_date',
            'number_of_people' => 'required|integer',
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => 'Name is required',
            'phone.required' => 'Phone is required',
            'start_date.required' => 'Start date is required',
            'end_date.required' => 'End date is required',
            'number_of_people.required' => 'Number of people is required',
            'number_of_people.integer' => 'Number of people must be an number',
            'end_date.after' => 'End date must be after start date',
            'start_date.date' => 'Start date must be a date',
            'end_date.date' => 'End date must be a date',
        ];
    }
}
