<?php

namespace App\Http\Requests\Identity;

use Illuminate\Foundation\Http\FormRequest;
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
            'identity_photo' => [
                'bail',
                'required',
                File::image()
                    ->extensions(['png', 'jpg', 'jpeg'])
                    ->max(3072),
            ],
            'country_of_residence' => [
                'bail',
                'required',
            ],
        ];
    }
}
