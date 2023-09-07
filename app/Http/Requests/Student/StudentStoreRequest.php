<?php

namespace App\Http\Requests\Student;

use Illuminate\Foundation\Http\FormRequest;

class StudentStoreRequest extends FormRequest
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
            'name' => '|string|max:255',
            'email' => '|email|unique:students',
            'password' => '|string|min:8',
            'gender' => '|in:1,2',
            'birthdate' => '|date',
            'joining_date' => '|date',
            'medical_history' => '|date',
            'city_id' => '|string|max:255',
            'phone_number' => '|string|max:255',
            'id_number' => '|string|max:255',
            'address' => ' |string',
            'about_me' => '|string',
            'derpatment' => '|string',
            'status' => '|in:0,1,2',
            'branch_id' => '|exists:branches,id',
            'period' => '|in:1,2,3',
            'blood_type' => '|string|max:255',
            'guardian_name' => '|string|max:255',
            'guardian_relationship' => '|string|max:255',
            'guardian_phone_number' => '|string|max:255',
            'guardian_email' => '|email',
            'guardian_whatsapp_number' => '|string|max:255',
            'profession' => '|string|max:255',
            'bus' => '|boolean',
            'receiving_officer' => '',
            'followup_officer' => '',
            'how_did_you_hear_about_us' => '|string|max:255',
            'image'=>'',
            'parents_social_status'=>'|string|max:255',
            'appointment'=>'|date',
            'classroom'=>'|string|max:255',
        ];
    }
}
