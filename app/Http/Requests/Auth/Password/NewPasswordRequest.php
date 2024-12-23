<?php

namespace App\Http\Requests\Auth\Password;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\Password;

class NewPasswordRequest extends FormRequest
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
            'token' => 'required',
            'email' => 'bail|required|string|email',
            'password' => [
                'bail',
                'required',
                Password::min(8)
                    ->max(24)
                    ->letters()
                    ->numbers()
                    ->symbols()
                    ->uncompromised(),
                'confirmed',
            ],
        ];
    }
}
