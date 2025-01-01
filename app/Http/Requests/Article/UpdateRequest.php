<?php

namespace App\Http\Requests\Article;

use App\Enums\RoleEnum;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\File;

class UpdateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return $this->user()->role !== RoleEnum::EXPERT;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'title' => 'bail|required|string|unique:articles,title|min:5|max:255',
            'cover' => [
                'bail',
                'required',
                File::image()
                ->extensions(['png', 'jpg', 'jpeg', 'webp'])
                ->max(3072)
            ],
            'content' => 'bail|required|string|min:5',
        ];
    }
}
