<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Goal extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function instructor()
    {
        return $this->belongsTo(Instructor::class);
    }

    public function subject()
    {
        return $this->belongsTo(Subject::class);
    }

    public function students()
    {
        return $this->belongsToMany(Student::class,'student_goals');
    }

    public function students_goals(): HasMany
    {
        return $this->hasMany(StudentGoal::class);
    }

    public function exam()
    {
        return $this->belongsTo(Exam::class);
    }

    public function exam_result()
    {
        return $this->belongsTo(ExamsResult::class);
    }

    public function class_room()
    {
        return $this->belongsTo(ClassRoom::class,'class_room_id');
    }

    public function course()
    {
        return $this->belongsTo(Course::class,'course_id');
    }
}
