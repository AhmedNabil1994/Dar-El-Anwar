<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class ParentInfoEditRequest extends FormRequest
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
        return $rules = [
            'father_name' => 'required|string',
            'father_occupation' => 'required|string',
            'father_national_id' => 'required|numeric',
            'father_phone_number' => 'required|numeric',
            'father_whatsapp_number' => 'required|numeric',
            'mother_name' => 'required|string',
            'mother_occupation' => 'required|string',
            'mother_national_id' => 'required|numeric',
            'mother_phone_number' => 'required|numeric',
            'mother_whatsapp_number' => 'required|numeric',
            'follow_up_person' => 'required|string',
            'follow_up_name' => 'required|string',
            'follow_up_relationship' => 'required|string',
            'follow_up_phone_number' => 'required|numeric',
            'follow_up_whatsapp_number' => 'required|numeric',
            'parents_id_card' => 'required|numeric',
            'student_pickup_optional' => 'nullable|in:0,1',
            'parents_marital_status' => 'nullable|string|max:191',

        ];

    }
}
