<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
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
            'name' => ['required', 'max:120'],
            'user_name' => ['required'],
            'email' => ['required', 'email', 'unique:users'],
            'phone' => ['required'],
            'type' => ['required'],
            'password' => ['required','confirmed'],
            'password_confirmation' => 'required|string|min:6|max:255',

        ];
    }
}
