<?php

namespace App\Http\Requests\Approval;

use App\Enums\DegreeLevelEnum;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class DegreeRequest extends FormRequest
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
            'level' => [
                'bail',
                'required',
                Rule::enum(DegreeLevelEnum::class),
            ],
            'level_precision' => 'bail|required|string|min:5|max:255',
            'started_at' => 'bail|required|date',
            'years_of_experience' => 'bail|required|integer|min:0|max:60',
            'file' => [
                'bail',
                'required',
                Rule::file()
                ->extensions('pdf')
                ->max(10240),
            ]
        ];
    }
}
