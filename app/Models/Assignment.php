<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Assignment extends Model
{
    use HasFactory;
    protected $guarded = [];
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function assignmentFiles()
    {
        return $this->hasMany(AssignmentFile::class);
    }
    public function student()
    {
        return $this->belongsToMany(Student::class,'student_duties');
    }

    public function subject()
    {
        return $this->belongsTo(Subject::class,'subject_id');
    }


//    protected static function boot()
//    {
//        parent::boot();
//        self::creating(function($model){
//            $model->uuid =  Str::uuid()->toString();
//            $model->user_id =  auth()->id();
//        });
//    }
}
