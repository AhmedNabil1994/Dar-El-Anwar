<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class EmployeeRequest extends FormRequest
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
        return  [
            'name' => ['required', 'string', 'max:191'],
            'address' => ['required', 'string', 'max:191'],
            'qualification' => ['required', 'string', 'max:191'],
            'university' => ['required', 'string', 'max:191'],
            'graduation_date' => ['required', 'date'],
            'national_id' => ['required', 'string', 'max:191'],
            'email' => ['required', 'string', 'email', 'max:191'],
            'phone' => ['required', 'string', 'max:191'],
            'birthdate' => ['required', 'date'],
            'job_title' => ['required', 'string', 'max:191'],
            'department' => ['required', 'string', 'max:191'],
            'salary' => ['required', 'numeric', 'between:0,999999.99'],
            'salary_cycle' => ['required', 'string', 'max:191'],
            'hiring_date' => ['required', 'date'],
            'work_days' => ['required', 'integer', 'between:0,31'],
            'branch' => ['required', 'string', 'max:191'],
            'password' => ['nullable', 'string', 'min:6', 'max:191','confirmed'],
            'password_confirmation' => ['nullable', 'string', 'min:6', 'max:191'],
            'management'=>['required'],
            'departure_time'=>['required'],
            'attendance_time'=>['required'],
            'status'=>['required'],
            //'image'=>['required'],

        ];

    }

}
