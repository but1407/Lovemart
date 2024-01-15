<?php

namespace App\Http\Requests\User;

use Illuminate\Foundation\Http\FormRequest;

class CreateUserRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'name' => 'required|unique:users',
            'email' => 'required|unique:users',
            'password' => 'required|min:4',


        ];
    }
    public function messages(): array
    {
        return [
            'name.required' => 'Trường "Tên " không được bỏ trống',
            'email.required'=> 'Trường "mô tả" không được bỏ trống',
            'email.unique'=> 'Trường "email" da ton tai',
            'password.required'=> 'Trường "password" không được bỏ trống',

            'password.min'=> 'Trường "password" phải ít nhất 4 ký tự',

        ];
    }
}