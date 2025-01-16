<?php

namespace App\Http\Requests\Statement;

use App\Enums\RoleEnum;
use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
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
            'published_at' => 'bail|nullable|date',
            'content' => 'bail|required|string|min:5',
        ];
    }
}
