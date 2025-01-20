<?php

namespace App\Http\Requests\Approval;

use App\Enums\TrainingLevelEnum;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class TrainingRequest extends FormRequest
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
            'name' => 'bail|string|min:2|max:255',
            'level' => [
                'bail',
                'required',
                Rule::enum(TrainingLevelEnum::class),
            ],
            'level_precision' => 'bail|required|string|min:5|max:255',
            'procured_at' => [
                'bail',
                'required',
                'string',
                'numeric',
                'min:1960',
                'max:2025'
            ],
            'trainer_name' => 'bail|required|string|min:2|max:155',
        ];
    }
}
