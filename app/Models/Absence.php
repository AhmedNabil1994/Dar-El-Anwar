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
        return $this->belongsTo(Instructor::class,'teacher');
    }
    public function students()
    {
        return $this->belongsTo(Student::class,'student');
    }
    public function subject()
    {
        return $this->belongsTo(Subject::class,'subject_id');
    }
    public function dept()
    {
        return $this->belongsTo(Department::class,'department');
    }

    public function class_room()
    {
        return $this->belongsTo(ClassRoom::class,'class');
    }
}
