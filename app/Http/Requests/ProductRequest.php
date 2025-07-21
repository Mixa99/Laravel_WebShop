<?php

namespace App\Http\Requests;

use App\Enum\CategoryEnum;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ProductRequest extends FormRequest
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
            'name' => 'required|string|min:6',
            'price' => 'required|numeric',
            'category' => [Rule::enum(CategoryEnum::class)],
            'quantity' => 'required|numeric',
            'path' => 'required|file'
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'The name field is required.',
            'name.string' => 'The name must be text',
            'name.min' => 'The name must have at least 6 characters',
            'price.required' => 'The price field is required',
            'price.numeric' => 'The price field is numeric only',
            'category' => 'There is invalid input',
            'quantity.required' => 'The quantity field is required',
            'quantity.numeric' => 'The quantity field is numeric only',
            'path.required' => 'The image is required.' 
        ];
        
    }
}
