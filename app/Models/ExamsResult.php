<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ExamsResult extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function exam()
    {
        return $this->belongsTo(Exam::class, 'exam_id');
    }

    public function student()
    {
        return $this->belongsTo(Student::class);
    }

    public function question()
    {
        return $this->belongsTo(Question::class, 'question_id');
    }

    public function goal()
    {
        return $this->belongsTo(Goal::class);
    }

}
