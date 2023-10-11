<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InstructorSubject extends Model
{
    use HasFactory;

    public function instructor()
    {
        return $this->belongsTo(Instructor::class);
    }

    public function subject()
    {
        return $this->belongsTo(Subject::class);
    }

    public function class_subjects()
    {
        return $this->belongsToMany(ClassRoom::class,
            'class_instructor_subjects',
            'instructor_subjects_id',
        'class_room_id');
    }
}
