<?php

namespace App\Http\Requests\Approval;

use App\Enums\LegalStatusEnum;
use App\Models\Approval;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class SocietyRequest extends FormRequest
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
            'name' => 'bail|required|string|min:2|max:255',
            'commercial_name' => 'bail|required|string|min:2|max:255',
            'founded_at' => 'bail|required|numeric|max:' . now()->year,
            'capital' => 'bail|required|numeric|min:50000|digits_between:5,255',
            'legal_status' => ['bail', 'required', Rule::enum(LegalStatusEnum::class)],
            'legal_status_precision' => 'bail|required|string|min:5|max:255',
            'status_file' => [
                'bail',
                'required',
                Rule::file()
                    ->extensions('pdf')
                    ->max(5120),
            ],
            'staff_number' => 'bail|required|numeric|digits_between:0,255',
            'salaried_technical_staff' => 'bail|required|numeric|digits_between:0,255',
            'salaried_administrative_staff' => 'bail|required|numeric|digits_between:0,255',
        ];
    }

    public function getApproval(): Approval
    {
        return $this->user()->approval;
    }
}
