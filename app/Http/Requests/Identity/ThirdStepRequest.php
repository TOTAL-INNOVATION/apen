<?php

namespace App\Http\Requests\Identity;

use App\Enums\ExpertStatusEnum;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ThirdStepRequest extends FormRequest
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
            'association' => 'nullable|string|min:5|max:255',
            'total_sectors' => 'required|int|min:1|max:3',
            'expert_status' => [
                'required',
                Rule::enum(ExpertStatusEnum::class),
            ]
        ];
    }
}
