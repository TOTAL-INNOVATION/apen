<?php

namespace App\Http\Requests\Identity;

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
            'commercial_register' => 'bail|required|string|min:8|max:255',
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
