<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StudentGoal extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function goal()
    {
        return $this->belongsTo(Goal::class);
    }
    public function student()
    {
        return $this->belongsTo(Student::class);
    }
}
