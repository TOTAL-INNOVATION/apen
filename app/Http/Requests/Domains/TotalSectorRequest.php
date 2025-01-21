<?php

namespace App\Http\Requests\Domains;

use App\Enums\ApprovalTypeEnum;
use App\Models\Approval;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\ValidationException;

class TotalSectorRequest extends FormRequest
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
            'total_sectors' => 'bail|int|min:1|max:3',
        ];
    }

    public function getApproval(): Approval
    {
        return $this->user()->approval;
    }

    public function checkIfMaxExceeded(): void
    {
        $max = ApprovalTypeEnum::maxDomains(
            $this->getApproval()->type
        );

        if ($max < (int)$this->total_sectors) {
            throw ValidationException::withMessages([
                'total_sectors' => __(
                    'messages.approval.domains.maxExceeded',
                    ['max' => $max]
                )
            ]);
        }
    }
}
