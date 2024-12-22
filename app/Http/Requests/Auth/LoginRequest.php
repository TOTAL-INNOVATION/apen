<?php

namespace App\Http\Requests\Auth;

use App\Traits\RateLimiting;
use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Validation\ValidationException;

class LoginRequest extends FormRequest
{
    use RateLimiting;

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
     * @return array<string, ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'email' => 'bail|required|string|email',
            'password' => 'bail|required|string'
        ];
    }

    /**
     * @return void
     * @throws ValidationException
     */
    public function authenticate() : void
    {
        if ($this->session()->get('error'))
            $this->session()->forget('error');

        $this->ensureIsNotRateLimited();
        $credentials = $this->only(['email', 'password']);

        if (!auth()->attempt($credentials))
        {
            RateLimiter::hit($this->throttleKey());
            throw ValidationException::withMessages([
                'email' => __('auth.failed'),
            ]);
        }

        RateLimiter::clear($this->throttleKey());
    }
}
