<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
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

    public function courses() : BelongsToMany
    {
        return $this->belongsToMany(Course::class,'student_courses');
    }

    public function class_room()
    {
        return $this->belongsTo(ClassRoom::class,'class_room_id');
    }

    public function absences(): HasMany
    {
        return $this->hasMany(Absence::class,'student_id');
    }

    public function dept() : BelongsToMany
    {
        return $this->belongsToMany(Department::class,'student_departments');
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

    public function get_parents_card_copy()
    {
        return$this->belongsTo(Upload::class,'parents_card_copy');
    }

    public function get_birth_certificate()
    {
        return$this->belongsTo(Upload::class,'birth_certificate');
    }

    public function get_another_file()
    {
        return$this->belongsTo(Upload::class,'another_file');
    }

    public function getImg()
    {
        return $this->upload?->file_name;
    }
    public function subscriptions()
    {
        return $this->belongsToMany(Subscription::class);
    }

    public function subjects()
    {
        return $this->belongsToMany(Subject::class,'student_subjects');
    }

    public function student_subject()
    {
        return $this->belongsTo(StudentSubject::class);
    }

    public function assignment()
    {
        return $this->belongsToMany(Assignment::class,'student_duties');
    }

    public function father()
    {
        return $this->parent?->where('relationship',1)->first();
    }

    public function mother()
    {
        return $this->parent?->where('relationship',2)->first();
    }

    public function level()
    {
        return $this->belongsToMany(Level::class,'student_levels');
    }




    public function students_subscriped()
    {
        return $this->hasMany(StudentSubscription::class);
    }




}
