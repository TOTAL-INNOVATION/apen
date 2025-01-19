<?php

namespace App\Http\Requests\Approval;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class AddressRequest extends FormRequest
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
            'geographic_region' => [
                'bail',
                'max:255',
                'required',
                Rule::in($this->getCountries())
            ],
            'region' => [
                'bail',
                'string',
                'max:255',
                Rule::requiredIf($this->requiredIfBurkina()),
                Rule::in($this->getRegions()),
            ],
            'province' => [
                'bail',
                'string',
                'max:255',
                Rule::requiredIf($this->requiredIfBurkina()),
                Rule::in($this->getProvinces()),
            ],
            'address' => [
                'bail',
                'nullable',
                'string',
                'min:5',
                'max:255',
                Rule::requiredIf($this->requiredIfNotBurkina()),
            ],
            'mailbox' => 'bail|nullable|string|min:2|max:255',
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
            'website' => 'bail|nullable|string|max:255|url',
            'fax' => 'bail|nullable|string|max:255',
        ];
    }

    public function messages(): array
    {
        return [
            'geographic_region.in' => __('La valeur fourni n\'est pas un nom de pays.'),
            'region.in' => 'La région sélectionné est invalide.',
            'province.in' => 'La province sélectionnée est invalide.',
        ];
    }

    public function requiredIfBurkina(): bool
    {
        return $this->input('geographic_region') === 'Burkina Faso';
    }

    public function requiredIfNotBurkina(): bool
    {
        return $this->input('geographic_region') !== 'Burkina Faso';
    }

    public function getCountries(): array
    {
        return array_map(function(array $country) {
            return $country['name'];
        }, countriesList());
    }

    public function getRegions(): array
    {
        return array_keys(
            regionsOfBurkinaFaso()
        );
    }

    public function getCallingCodes(): array
    {
        return array_map(function(array $country) {
            if ($country['callingCode']) return $country['callingCode'];
        }, countriesList());
    }

    public function getProvinces(): array
    {
        return regionsOfBurkinaFaso()[$this->input('region')] ?? [];
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
