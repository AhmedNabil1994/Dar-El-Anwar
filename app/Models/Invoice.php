<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    protected $guarded =[];


    public function student()
    {
        return $this->belongsTo(Student::class);
    }

    public function subscription()
    {
        return $this->belongsTo(StudentSubscription::class,'subscription_id');
    }

    public function class_room()
    {
        return $this->belongsTo(ClassRoom::class,'classroom');
    }

    public function scopePaid($query)
    {
        return $query->whereNotNull('paid_at');
    }

    public function scopeUnpaid($query)
    {
        return $query->whereNull('paid_at');
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }


}
