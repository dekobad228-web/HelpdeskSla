<?php

namespace App\Http\Requests\Auth;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\Password;

class LoginRequest extends FormRequest
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
     * @return array<string, ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'email' => [
                'required',
                'string',
                'email',
                'exists:users,email'
            ],
            'password' => [
                'required',
                Password::min(3)->numbers()
            ]
        ];
    }

    public function messages()
    {
        return [
            'email.required' => 'Введите email',
            'email.string' => 'Email должен быть строкой',
            'email.email' => 'Email не правильного формата',
            'email.exists' => 'Email не зарегистрирован',

            'password.required' => 'Введите пароль',
            'password.min' => 'Пароль должен быть минимум :min символа'
        ];
    }
}
