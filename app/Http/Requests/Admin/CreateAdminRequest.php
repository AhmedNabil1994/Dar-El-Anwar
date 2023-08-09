<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class CreateAdminRequest extends FormRequest
{
    public function authorize()
    {
        return $this->user()->can('create-admins');
    }

    public function rules()
    {
        return [
            'name' => ['required', 'string', 'max:80'],
            'email' => 'required|string|email|max:150|unique:admins',
            'username' => 'required|string|max:60|unique:admins',
            'phone' => 'required|string|max:20',
            'password' => 'required|string|min:6|max:255|confirmed',
            'password_confirmation' => 'required|string|min:6|max:255',
            'role'=>'nullable'
        ];
    }
}
