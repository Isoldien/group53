<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateProfileRequest extends FormRequest
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
            'name' => ['sometimes', 'string', 'max:120'],
            'email' => [
                'sometimes',
                'string',
                'email',
                'max:120',
                Rule::unique('users', 'email')->ignore($this->user()->user_id, 'user_id')
            ],
            'phone' => ['nullable', 'string', 'max:30'],
        ];
    }

    /**
     * Get custom error messages for validator.
     *
     * @return array<string, string>
     */
    public function messages(): array
    {
        return [
            'name.max' => 'Name must not exceed 120 characters',
            'email.email' => 'Please provide a valid email address',
            'email.unique' => 'This email is already in use',
            'phone.max' => 'Phone number must not exceed 30 characters',
        ];
    }
}
