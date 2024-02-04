<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;


class AddArticleReques extends FormRequest
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
            'titre'=>'required|min:5',
            'prix'=>'required',
            'category'=>'required|min:5'
        ];
    }

    public function messages()
    {
        return [
            'titre.required'=>'titre is required',
            'titre.min'=>'too short enter more',
            'prix.required'=>'price is required',
            'category.min'=>'too short enter more',
            'category.required'=>'category is required'

        ];
    }
}
