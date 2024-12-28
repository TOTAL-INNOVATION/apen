<?php

namespace App\Http\Requests\User;

use App\Enums\RoleEnum;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return $this->user()->role !== RoleEnum::EXPERT;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'firstname' => 'bail|required|string|min:5|max:50',
            'lastname' => 'bail|required|string|min:5|max:50',
            'email' => 'bail|required|string|lowercase|email|unique:users,email',
            'role' => Rule::enum(RoleEnum::class),
        ];
    }
}