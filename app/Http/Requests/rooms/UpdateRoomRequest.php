<?php

namespace App\Http\Requests\rooms;

use Illuminate\Foundation\Http\FormRequest;

class UpdateRoomRequest extends FormRequest
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
            'name' => 'nullable|string|max:255',
            'description' => 'required|string',
            'type' => 'required|integer',
            'status' => 'required|integer',
            'images' => 'nullable|array',
            'images.*' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'price' => 'required|numeric',
        ];
    }

    public function messages()
    {
        return [
            'description.required' => 'The description field is required.',
            'type.required' => 'The type field is required.',
            'status.required' => 'The status field is required.',
            'price.required' => 'The price field is required.',
        ];
    }
}
