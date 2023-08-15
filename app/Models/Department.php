<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Department extends Model
{
    use HasFactory;

    protected $table = 'departments';
    protected $fillable = [
        'name',
        'image',
        'is_feature',
        'slug',
    ];

    public function courses()
    {
        return $this->hasMany(Course::class, 'category_id');
    }

    public function activeCourses()
    {
        return $this->hasMany(Course::class, 'category_id')->where('status', 1);
    }

    public function subcategories()
    {
        return $this->hasMany(Subcategory::class);
    }

    public function scopeActive($query)
    {
        return $query->where('status', 1);
    }

    public function scopeFeature($query)
    {
        return $query->where('is_feature', 'yes');
    }

    public function getImagePathAttribute()
    {
        if ($this->image)
        {
            return $this->image;
        } else {
            return 'uploads/default/no-image-found.png';
        }
    }


    protected static function boot()
    {
        parent::boot();
        self::creating(function($model){
            $model->uuid =  Str::uuid()->toString();
        });
    }

    public function upload()
    {
        return$this->belongsTo(Upload::class,'image');
    }

    public function getImg()
    {
        return $this->upload?->file_name;
    }

    public function subjects()
    {
        return $this->hasMany(Subject::class);
    }
}
