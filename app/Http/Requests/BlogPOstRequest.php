<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class BlogPOstRequest extends FormRequest
{


    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'title' => "bail|required|string|max:255|unique:post,title,{$this->input('id')}",
            'author' => 'required',
            'body' => 'required',

        ];
    }
    public function messages(){
        return [
            'title.required' => 'mandatory is filed',
            'author.required' => 'mandatory is filed',
            'body.required' => 'mandatory is filed',
        ];
    }

}
