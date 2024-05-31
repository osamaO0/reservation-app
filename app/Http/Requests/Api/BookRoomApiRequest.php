<?php

namespace App\Http\Requests\Api;

use Illuminate\Foundation\Http\FormRequest;

class BookRoomApiRequest extends FormRequest
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
            'start_date' => 'required|date|after_or_equal:today',
            'end_date' => 'required|date|after:start_date',
            'name' => 'required|string|max:255',
            'phone' => 'required|string|max:255',
            'number_of_people' => 'required|integer|min:1',
        ];
    }

    public function messages(): array
    {
        return [
            'required' => 'The :attribute field is required.',
            'integer' => 'The :attribute must be an integer.',
            'exists' => 'The :attribute does not exist.',
            'after_or_equal' => 'The :attribute must be after or equal to today.',
            'after' => 'The :attribute must be after :date.',
            'min' => 'The :attribute must be at least :min.',
        ];
    }
}
