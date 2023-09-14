<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Str;
use PhpParser\Node\Expr\Assign;

class Student extends Authenticatable
{
    use HasFactory;

    protected $table = 'students';
    protected $guarded = [];

    public function parent()
    {
        return $this->hasMany(ParentInfo::class,'student_id');
    }

    public function courses()
    {
        return $this->belongsToMany(Course::class,'student_courses');
    }

    public function class_room()
    {
        return $this->belongsTo(ClassRoom::class,'classroom');
    }

    public function is_absence()
    {
        return $this->hasMany(Absence::class,'student');
    }

    public function dept()
    {
        return $this->belongsTo(Department::class,'department_id');
    }

    public function branch()
    {
        return $this->belongsTo(Branch::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
    public function getcountry()
    {
        return $this->hasOne(Country::class,'id','country_id');
    }


    public function getcity()
    {
        return $this->hasOne(City::class,'id','city_id');
    }

    public function parentInfo()
    {
        return $this->hasMany(ParentInfo::class);
    }

    public function scopeApproved($query)
    {
        return $query->where('status', 1);
    }

    public function scopePending($query)
    {
        return $query->where('status', 0);
    }

    public function upload()
    {
        return$this->belongsTo(Upload::class,'image');
    }

    public function getImg()
    {
        return $this->upload->file_name;
    }
    public function subscriptions()
    {
        return $this->belongsToMany(Subscription::class);
    }

    public function subject()
    {
        return $this->belongsTo(Subject::class,'subject_id');
    }

    public function assignment()
    {
        return $this->hasOne(Assignment::class);
    }

    public function father()
    {
        return $this->parent?->where('relationship','father')->first();
    }

    public function mother()
    {
        return $this->parent?->where('relationship','mother')->first();
    }
}
