<?php

namespace App\Http\Requests\roles;

use Illuminate\Foundation\Http\FormRequest;

class StoreRoleRequest extends FormRequest
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
            'permissions' => 'required|array',
            'permissions.*' => 'required|string|exists:permissions,name',
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => 'The name field is required.',
            'name.string' => 'The name field must be a string.',
            'name.max' => 'The name field must be less than 255 characters.',
            'permissions.required' => 'The permissions field is required.',
            'permissions.array' => 'The permissions field must be an array.',
            'permissions.*.required' => 'The permissions field is required.',
            'permissions.*.string' => 'The permissions field must be a string.',
            'permissions.*.exists' => 'The permissions field must exist in the permissions table.',
        ];
    }
}
