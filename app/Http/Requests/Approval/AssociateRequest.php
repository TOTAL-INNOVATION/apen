<?php

namespace App\Http\Requests\Approval;

use App\Enums\QualificationEnum;
use App\Models\Approval;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class AssociateRequest extends FormRequest
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
            'firstname' => 'bail|required|string|min:2|max:255',
            'lastname' => 'bail|required|string|min:2|max:255',
            'role' => 'bail|required|string|min:2|max:255',
            'qualification' => ['bail', 'required', Rule::enum(QualificationEnum::class)],
            'approval' => [
                'bail',
                'required',
                Rule::file()
                    ->extensions('pdf')
                    ->max(5120),
            ],
        ];
    }

    public function getApproval(): Approval
    {
        return $this->user()->approval;
    }
}
