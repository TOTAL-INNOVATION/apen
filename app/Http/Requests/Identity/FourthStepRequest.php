<?php

namespace App\Http\Requests\Identity;

use App\Enums\ActivitySectorEnum;
use App\Enums\StatusInSectorEnum;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class FourthStepRequest extends FormRequest
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
            'activity_sector' => [
                'required',
                Rule::enum(ActivitySectorEnum::class)
            ],
            'status_in_sector' => [
                'required',
                Rule::enum(StatusInSectorEnum::class),
            ],
            'category' => [
                'required',
                Rule::in(['A', 'B', 'C'])
            ]
        ];
    }
}
