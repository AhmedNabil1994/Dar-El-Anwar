<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Absence extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function instructor()
    {
        return $this->belongsTo(Instructor::class,'instructor_id');
    }
    public function student()
    {
        return $this->belongsTo(Student::class,'student_id');
    }
    public function student_subject()
    {
        return $this->belongsTo(StudentSubject::class,'student_subjects_id');
    }
    public function dept()
    {
        return $this->belongsTo(Department::class,'department_id');
    }

    public function level()
    {
        return $this->belongsTo(Level::class,'level_id');
    }

}
