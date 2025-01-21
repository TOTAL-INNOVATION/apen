<?php

namespace App\Http\Requests\Approval;

use App\Models\Approval;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules\File;

class FinalRequest extends FormRequest
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
            'cv' => [
                'bail',
                'required',
                Rule::file()
                    ->extensions('pdf')
                    ->max(5120),
            ],
            'signature' => [
                'bail',
                'required',
                File::image()
                    ->extensions(['png', 'jpg', 'jpeg'])
                    ->max(3072),
            ],
        ];
    }

    public function getApproval(): Approval
    {
        return $this->user()->approval;
    }
}
