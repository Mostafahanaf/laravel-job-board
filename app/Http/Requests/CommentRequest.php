<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class CommentRequest extends FormRequest
{


    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'author' => 'required|string',
            'body' => 'required|string',

        ];
    }
    public function messages(){
        return [
            'author.required' => 'mandatory is filed',
            'body.required' => 'mandatory is filed',
        ];
    }

}
