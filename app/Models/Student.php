<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Str;

class Student extends Authenticatable
{
    use HasFactory;

    protected $table = 'students';
    protected $guarded = [];

    public function parent()
    {
        return $this->hasOne(ParentInfo::class,'student_id');
    }

    public function is_absence()
    {
        return $this->hasMany(Absence::class,'student');
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
        return $this->hasOne(ParentInfo::class);
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
        return $this->hasMany(Subscription::class);
    }
}
