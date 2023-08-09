<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EditAdminRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return $this->user()->can('edit-admins');
    }


    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        $id = $this->route('uuid');

        return [
            'name' => 'required|string|max:80',
            'email' => 'required|email|unique:admins,email,' . $id . '|max:150',
            'username' => 'required|string|unique:admins,username,' . $id . '|max:60',
            'phone' => 'required|string|unique:admins,phone,' . $id . '|max:20',
            'password' => 'nullable|string|min:6|max:255|confirmed',
            'role'=> 'nullable'
        ];
    }

}
