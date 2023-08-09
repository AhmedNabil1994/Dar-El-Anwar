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
        'branch',
        'password',
        'management',
        'departure_time',
        'attendance_time',
        'image',
        'type',

    ];

    public function instructor(){
        return $this->hasMany(Instructor::class,'employee_id');
    }
    public function upload()
    {
        return$this->belongsTo(Upload::class,'image');
    }
    public function getImg()
    {
        return $this->upload->file_name;
    }

}
