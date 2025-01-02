<?php

namespace App\Http\Requests\Article;

use App\Enums\RoleEnum;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules\File;

class UpdateRequest extends FormRequest
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
            'title' => [
                'bail',
                'required',
                'string',
                Rule::unique('articles', 'title')
                ->ignore($this->article),
                'min:5',
                'max:255'
            ],
            'published_at' => 'bail|required|date',
            'cover' => [
                'bail',
                'nullable',
                File::image()
                ->extensions(['png', 'jpg', 'jpeg', 'webp'])
                ->max(3072)
            ],
            'content' => 'bail|required|string|min:5',
        ];
    }
}
