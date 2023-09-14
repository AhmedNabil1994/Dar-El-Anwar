<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class ParentInfo extends Authenticatable
{
    use HasFactory;
    //generate student relationship
   protected $guarded = [];

    public function student()
    {
        return $this->belongsTo(Student::class,'student_id');
    }


}
