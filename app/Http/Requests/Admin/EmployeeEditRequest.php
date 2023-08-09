<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class EmployeeEditRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,'.$this->route('employee'),
            'national_id' => 'required|string|max:255|unique:employees,national_id,'.$this->route('employee'),
            'phone' => 'required|string|max:255|unique:employees,phone,'.$this->route('employee'),
            'birthdate' => 'required|date',
            'job_title' => 'required|string|max:255',
            'department' => 'required|string|max:255',
            'salary' => 'required|numeric|min:0',
            'salary_cycle' => 'required|string|max:255',
            'hiring_date' => 'required|date',
            'work_days' => 'required|integer|min:1|max:31',
            'branch' => 'required|string|max:255',
//            'password' => 'nullable|string|min:8|confirmed',
        ];
    }

}
