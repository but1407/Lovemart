<?php

namespace App\Http\Requests\Role;

use Illuminate\Foundation\Http\FormRequest;

class CreateRoleRequest extends FormRequest
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
            'name' => 'required|unique:roles',
            'display_name' =>'required',
        ];
    }
    public function messages() :array{
        return [
            'name.required' => 'Trường "Tên" không được bỏ trống',
            'display_name.required' => 'Trường "Mo ta" không được bỏ trống',
        ];
    }
    
}