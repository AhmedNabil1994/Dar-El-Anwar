<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Subcategory extends Model
{
    use HasFactory;

    protected $table = 'subcategories';
    protected $primaryKey = 'id';
    protected $fillable = [
        'category_id',
        'name',
        'slug'
    ];

    public function courses()
    {
        return $this->hasMany(Course::class, 'subcategory_id');
    }

    public function activeCourses()
    {
        return $this->hasMany(Course::class, 'subcategory_id')->where('status', 1);
    }

    public function category()
    {
        return $this->belongsTo(Department::class);
    }

    protected static function boot()
    {
        parent::boot();
        self::creating(function($model){
            $model->uuid =  Str::uuid()->toString();
        });
    }

}
