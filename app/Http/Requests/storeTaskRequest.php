<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class storeTaskRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        // Must be True
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
            'title' => 'required|max:50',
            'comment' => 'required'
        ];
    }
    // if I want to change the message which show when the validation false
//    public function messages(): array
//    {
//        return [
//            'title.required' => 'A title is required',
//            'body.required' => 'A message is required',
//        ];
//    }
}
