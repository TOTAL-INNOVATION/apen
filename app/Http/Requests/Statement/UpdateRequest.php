<?php

namespace App\Http\Requests\Statement;

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
            'title' => [
                'bail',
                'required',
                'string',
                Rule::unique('articles', 'title')
                ->ignore($this->statement),
                'min:5',
                'max:255'
            ],
            'published_at' => 'bail|required|date',
            'content' => 'bail|required|string|min:5',
        ];
    }
}
