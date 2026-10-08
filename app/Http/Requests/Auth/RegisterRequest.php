<?php

namespace App\Http\Requests\Auth;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\Password;

class RegisterRequest extends FormRequest
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
            'name' => [
                'required',
                'string',
                'max:100',
            ],
            'email' => [
                'required',
                'string',
                'email',
                'unique:users,email'
            ],
            'password' => [
                'required',
                'confirmed',
                Password::min(3)->numbers()
            ]
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Введите имя',
            'name.string' => 'Поле имени не должно содержать цифры',
            'name.max' => 'Поле имени превышает допустимое количество символов',

            'email.required' => 'Введите email',
            'email.string' => 'Email должен быть строкой',
            'email.email' => 'Email записан в неправильном формате',
            'email.unique' => 'Такой email уже существует',

            'password.required' => 'Введите пароль',
            'password.confirmed' => 'Пароли не совпадают',
            'password.min' => 'Пароль должен содержать минимум :min символов'
        ];
    }
}
