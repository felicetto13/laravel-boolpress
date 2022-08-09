<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PostRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            "title" => "required|min:10",
            "text" => "required|min:10",
        ];
    }
    public function messages()
{
    return [
        'title.required' => 'Inserire un titolo!',
        'title.min' => 'Inserire un titolo più lungo.',
        'text.required' => 'Inserire contenuto post!',
        'text.min' => 'Il testo deve essere almeno di 10 caratteri',
        
    ];
}
}
