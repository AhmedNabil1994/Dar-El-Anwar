<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subscription extends Model
{
    use HasFactory;

    protected $guarded = [];


    public function course()
    {
        return $this->belongsTo(Course::class);
    }

    public function students()
    {
        return $this->belongsToMany(Student::class);
    }

    public function students_subscriped()
    {
        return $this->hasMany(StudentSubscription::class);
    }

    public function payments()
    {
        return $this->hasMany(Payment::class);
    }

    public function invoice()
    {
        return $this->hasOne(Invoice::class);
    }

    public function department()
    {
        return $this->belongsTo(Department::class,'department_id');
    }

    public function courses()
    {
        return $this->belongsToMany(Course::class, 'subscription_courses');
    }
    public function bus()
    {
        return $this->hasOne(Bus::class);
    }
}
