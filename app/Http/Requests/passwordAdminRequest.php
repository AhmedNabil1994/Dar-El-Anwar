<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class passwordAdminRequest extends FormRequest
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
        return [
             'password' => 'required|string|min:6|max:255|confirmed',
             'password_confirmation' => 'required|string|min:6|max:255',
        ];
    }
}
