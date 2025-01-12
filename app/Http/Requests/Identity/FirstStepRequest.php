<?php

namespace App\Http\Requests\Identity;

use App\Enums\{GenderEnum, MaritalStatusEnum};
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class FirstStepRequest extends FormRequest
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
            'birthday' => 'bail|required|date',
            'birthplace' => 'bail|required|string|min:5|max:255',
            'gender' => ['bail', 'required', Rule::enum(GenderEnum::class)],
            'marital_status' => ['bail', 'required', Rule::enum(MaritalStatusEnum::class)],
        ];
    }
}
