<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateEletroRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'name' => ['required','string'],
            'image' => ['required','string'],
            'tension' => ['required','string'],
            'brand' => ['required','string'],
            'price' => ['required', 'numeric', 'gte:0.01'],
            'description' => ['required','max:200', 'min: 15']
        ];
    }
}
