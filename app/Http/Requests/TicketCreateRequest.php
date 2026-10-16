<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;
use Override;

class TicketCreateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return $this->user() !== null;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'subject' => [
                'required',
                'string',
                'max:100'
            ],
            'body' => [
                'required',
                'string',
                'max:1000'
            ],
            'category_id' => [
                'required',
                'integer',
                'exists:categories,id'
            ]
        ];
    }

    #[Override]
    public function messages()
    {
        return [
            'subject.required' => 'Задайте тему заявки',
            'subject.string' => 'Неверный формат темы',
            'subject.max' => 'Превышено максимальное количество символов',
            'body.required' => 'Заполните письмо',
            'body.string' => 'Неверный формат письма',
            'body.max' => 'Превышено максимальное количество символов',
            'category_id.required' => 'Выберите категорию',
            'category_id.exists' => 'Такой категории не существует'
        ];
    }
}
