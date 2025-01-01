<?php

namespace App\Http\Requests\User;

use App\Enums\RoleEnum;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateRequest extends FormRequest
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
            'firstname' => 'bail|required|string|min:2|max:50',
            'lastname' => 'bail|required|string|min:2|max:50',
            'role' => Rule::enum(RoleEnum::class),
            'email' => [
                'bail',
                'required',
                'email',
                Rule::unique('users', 'email')
                ->ignore($this->utilisateur)
            ],
        ];
    }
}
