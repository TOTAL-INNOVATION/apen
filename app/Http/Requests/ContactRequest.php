<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ContactRequest extends FormRequest
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
            'firstname' => 'bail|required|string|min:2|max:50',
            'lastname' => 'bail|required|string|min:2|max:50',
            'email' => 'bail|required|email|max:254',
            'subject' => 'bail|required|string|min:7|max:124',
            'message' => 'bail|required|string|min:64|max:1064',
        ];
    }
}
