<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Level extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function student()
    {
        return $this->belongsToMany(Student::class,'student_levels');
    }

    public function class()
    {
        return $this->hasMany(ClassRoom::class, 'level_id');
    }

}
