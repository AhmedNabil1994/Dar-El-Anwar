<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class StudentNotification extends Model
{
    use HasFactory;
    protected $guarded = [];

    protected $table = 'student_notifications';

    public function user()
    {
        return $this->belongsTo(Student::class,'user_id');
    }

    public function sender()
    {
        return $this->belongsTo(Admin::class, 'sender_id');
    }

    protected static function boot()
    {
        parent::boot();
        self::creating(function($model){
            $model->uuid =  Str::uuid()->toString();
            if (auth()->check())
            {
                $model->sender_id =  auth()->id();
            }

        });
    }
}
