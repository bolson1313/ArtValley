<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateUserRequest extends FormRequest
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
            'name' => 'required|string|max:50|min:3',
            'surname' => 'required|string|max:50|min:3',
            'nickname' => 'required|string|max:50|min:3|unique:users,nickname,'.$this->user()->id.',id',
            'file_input' => 'mimes:jpeg,png,jpg|max:5048',
            'email' => 'required|string|email|max:70|unique:users,email,'.$this->user()->id.',id',
            'password' => 'required|string|min:8|confirmed',
        ];
    }
}
