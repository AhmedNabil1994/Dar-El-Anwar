<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function department()
    {
        return $this->belongsTo(Department::class);
    }

    public function instructor()
    {
        return $this->belongsToMany(Instructor::class,'instructor_subjects');
    }

    public function student()
    {
        return $this->belongsToMany(Student::class,'student_subjects');
    }

    public function goal()
    {
        return $this->hasMany(Goal::class);
    }

    public function class_subjects()
    {
        return $this->belongsToMany(ClassRoom::class,'class_subjects');
    }
}
