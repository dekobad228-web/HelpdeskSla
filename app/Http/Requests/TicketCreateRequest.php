<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

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
}
