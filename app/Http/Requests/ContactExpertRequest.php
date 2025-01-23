<?php

namespace App\Http\Requests;

use App\Enums\DomainTypeEnum;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ContactExpertRequest extends FormRequest
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
            'structure' => 'bail|required|string|min:2|max:255',
            'geographic_region' => [
                'bail',
                'max:255',
                'required',
                Rule::in($this->getCountries())
            ],
            'address' => 'bail|required|string|min:5|max:255',
            'tel' => 'bail|nullable|string|numeric|min:4|digits_between:3,40',
            'tel-code' => [
                'bail',
                Rule::requiredIf($this->input('tel') !== null),
                Rule::in($this->getCallingCodes()),
            ],
            'mobile' => 'bail|required|string|numeric|min:4|digits_between:3,40',
            'mobile-code' => [
                'bail',
                'required',
                Rule::in($this->getCallingCodes())
            ],
            'expert_domain' => [
                'bail',
                'required',
                Rule::enum(DomainTypeEnum::class),
            ],
        ];
    }

    public function messages(): array
    {
        return [
            'geographic_region.in' => __('La valeur fourni n\'est pas un nom de pays.'),
        ];
    }

    public function getCountries(): array
    {
        return array_map(function(array $country) {
            return $country['name'];
        }, countriesList());
    }

    public function getCallingCodes(): array
    {
        return array_map(function(array $country) {
            if ($country['callingCode']) return $country['callingCode'];
        }, countriesList());
    }

        /**
     * Get expert telephone number
     * @return string
     */
    public function getTel(): ?string
    {
        if (!$tel = $this->input('tel')) return null;

        return $this->input('tel-code') . $tel;
    }

    /**
     * Get expert mobile phone number
     * @return string
     */
    public function getMobile(): string
    {
        return $this->input('mobile-code') . $this->input('mobile');
    }
}
