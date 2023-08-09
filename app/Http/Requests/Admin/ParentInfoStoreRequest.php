<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class ParentInfoStoreRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'father_name' => 'required|string|max:191',
            'father_occupation' => 'required|string|max:191',
            'father_national_id' => 'required|string|max:191',
            'father_phone_number' => 'required|string|max:191',
            'father_whatsapp_number' => 'required|string|max:191',
            'mother_name' => 'required|string|max:191',
            'mother_occupation' => 'required|string|max:191',
            'mother_national_id' => 'required|string|max:191',
            'mother_phone_number' => 'required|string|max:191',
            'mother_whatsapp_number' => 'required|string|max:191',
            'follow_up_person' => 'required|string|max:191',
            'follow_up_name' => 'required|string|max:191',
            'follow_up_relationship' => 'required|string|max:191',
            'follow_up_phone_number' => 'required|string|max:191',
            'follow_up_whatsapp_number' => 'required|string|max:191',
            'parents_marital_status' => 'required|string|max:191',
            'parents_id_card' => 'required|string|max:191',
            'parents_id_card_number' => 'required|string|max:191',
            'student_pickup_optional' => 'nullable|in:0,1',
        ];
    }
}
