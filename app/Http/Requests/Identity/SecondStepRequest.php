<?php

namespace App\Http\Requests\Identity;

use App\Enums\ApprovalTypeEnum;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Cache;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules\File;

class SecondStepRequest extends FormRequest
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
            'country_of_residence' => [
                'bail',
                'required',
                Rule::in($this->countries())
            ],
            'identity_photo' => [
                'bail',
                'required',
                File::image()
                    ->extensions(['png', 'jpg', 'jpeg'])
                    ->max(3072),
            ],
            'commercial_register' => [
                'bail',
                'string',
                'min:8',
                'max:255',
                Rule::requiredIf(function() {
                    /**
                     * @var \App\Models\Approval
                     */
                    $approval = $this->user()->approval;

                    return $approval->type === ApprovalTypeEnum::CATEGORY_A;
                }),
            ],
        ];
    }

    public function countries(): array
    {
        return Cache::rememberForever(
            'countries_rule',
            fn() => array_values(
                getCountries()
            )
        );
    }
}
