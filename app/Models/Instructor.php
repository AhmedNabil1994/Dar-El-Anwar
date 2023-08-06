<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Str;

class Instructor extends Authenticatable
{
    use HasFactory;

    protected $table = 'instructors';
    protected $guarded = [];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function employee(){
        return $this->belongsTo(Employee::class,'employee_id');
    }

    public function getFullNameAttribute($value)
    {
        return $this->first_name.' '.$this->last_name;
    }

    public function courses()
    {
        return $this->hasMany(Course::class, 'instructor_id');
    }

    public function publishedCourses()
    {
        return $this->hasMany(Course::class, 'instructor_id')->where('status', 1);
    }

    public function pendingCourses()
    {
        return $this->hasMany(Course::class, 'instructor_id')->where('status', 2);
    }

    public function country()
    {
        return $this->belongsTo(Country::class, 'country_id');
    }

    public function state()
    {
        return $this->belongsTo(State::class, 'state_id');
    }

    public function certificates()
    {
        return $this->hasMany(Instructor_certificate::class, 'instructor_id');
    }

    public function awards()
    {
        return $this->hasMany(Instructor_awards::class, 'instructor_id');
    }


    public function getNameAttribute()
    {
        return $this->first_name .' '. $this->last_name;
    }

    public function scopePending($query)
    {
        return $query->where('status', 0);
    }

    public function scopeApproved($query)
    {
        return $query->where('status', 1);
    }

    public function scopeBlocked($query)
    {
        return $query->where('status', 2);
    }

    public function scopeConsultationAvailable($query)
    {
        return $query->where('consultation_available', 1);
    }

    protected static function boot()
    {
        parent::boot();
        self::creating(function($model){
            $model->uuid =  Str::uuid()->toString();
        });
    }

}
