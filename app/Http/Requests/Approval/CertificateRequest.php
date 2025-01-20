<?php
namespace App\Http\Requests\Approval;

use App\Models\Approval;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class CertificateRequest extends FormRequest
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
            'subject'      => 'bail|required|string|min:5|max:255',
            'starts_at'    => 'bail|required|date',
            'ends_at'      => 'bail|required|date',
            'location'     => 'bail|required|string|min:2|max:255',
            'trainer_name' => 'bail|required|string|min:2|max:255',
            'file'         => [
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
