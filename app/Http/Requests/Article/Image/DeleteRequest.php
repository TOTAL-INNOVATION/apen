<?php

namespace App\Http\Requests\Article\Image;

use Illuminate\Foundation\Http\FormRequest;

class DeleteRequest extends FormRequest
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
            'path' => 'bail|required|starts_with:storage',
        ];
    }

    public function messages(): array
    {
        return [
            'starts_with' => 'Le chemain de l\'image doit commencer par "storage".',
        ];
    }
}
