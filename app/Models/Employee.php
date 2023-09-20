<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'birthdate',
        'address',
        'qualification',
        'phone',
        'job_title',
        'salary',
        'university',
        'graduation_date',
        'national_id',
        'email',
        'department',
        'salary_cycle',
        'hiring_date',
        'work_days',
        'branch_id',
        'password',
        'management',
        'departure_time',
        'attendance_time',
        'image',
        'type',
        'status',
        'level',

    ];

    public function instructor(){
        return $this->hasOne(Instructor::class,'employee_id');
    }
    public function department(){
        return $this->belongsTo(Department::class,'department_id');
    }
    public function upload()
    {
        return$this->belongsTo(Upload::class,'image');
    }
    public function getImg()
    {
        return $this->upload->file_name;
    }

    public function salary()
    {
        return $this->hasOne(Salary::class,'employee_id');
    }

    public function attendance_leave()
    {
        return $this->hasMany(AttendanceLeave::class);
    }

}
