<?php

namespace App\Http\Requests\Approval;

use App\Enums\DomainTypeEnum;
use App\Models\Approval;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class DomainRequest extends FormRequest
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
            'type' => [
                'bail',
                'required',
                Rule::enum(DomainTypeEnum::class),
            ],
            'first_subdomain' => [
                'bail',
                'required',
                Rule::in($this->subdomains())
            ],
            'second_subdomain' => [
                'bail',
                'nullable',
                Rule::in($this->subdomains())
            ],
            'third_subdomain' => [
                'bail',
                'nullable',
                Rule::in($this->subdomains())
            ]
        ];
    }

    public function subdomains(): array
    {
        $type = DomainTypeEnum::findFromValue(
            $this->input('type')
        );

        if (!$type) return [];

        return DomainTypeEnum::subDomains($type);
    }
    
    public function getApproval(): Approval
    {
        return $this->user()->approval;
    }
}
