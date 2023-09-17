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
        return $this->belongsTo(Instructor::class);
    }

    public function student()
    {
        return $this->belongsToMany(Student::class,'student_subjects');
    }

}
