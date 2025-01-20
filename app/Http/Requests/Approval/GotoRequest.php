<?php

namespace App\Http\Requests\Approval;

use App\Enums\ApprovalFormsEnum;
use App\Models\Approval;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class GotoRequest extends FormRequest
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
            'page' => [
                'bail',
                'required',
                Rule::enum(ApprovalFormsEnum::class)
            ],
        ];
    }

    public function getApproval(): Approval
    {
        return $this->user()->approval;
    }
}
