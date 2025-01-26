<?php

namespace App\Http\Requests\Identity;

use App\Enums\ApprovalTypeEnum;
use App\Enums\ExpertStatusEnum;
use App\Models\Approval;
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
            'commercial_register' => 'nullable|string|min:8|max:255',
            'single_tax_form' => 'nullable|string|min:3|max:255',
            'expert_status' => [
                'required',
                Rule::enum(ExpertStatusEnum::class),
            ],
            'has_been_public_agent' => [
                'bail',
                'boolean',
                Rule::requiredIf($this->checkIfCategoryB()),
            ],
        ];
    }

    public function checkIfCategoryB(): bool
    {
        return $this->getApproval()->type === ApprovalTypeEnum::CATEGORY_B;
    }
    
    public function getApproval(): Approval
    {
        return $this->user()->approval;
    }
}
