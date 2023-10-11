<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ClassRoom extends Model
{
    use HasFactory;
    protected $table = 'class_room';
    protected $guarded = [];
    public function department()
    {
        return $this->belongsTo(Department::class);
    }

    public function students()
    {
        return $this->hasMany(Student::class);
    }

    public function level()
    {
        return $this->belongsTo(Level::class);
    }

    public function class_subjects()
    {
        return $this->belongsToMany(InstructorSubject::class,'class_instructor_subjects',
            'class_room_id','instructor_subjects_id');
    }
}
