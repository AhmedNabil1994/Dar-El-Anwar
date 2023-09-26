<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bus extends Model
{
    use HasFactory;
    protected $guarded = [];
    public $timestamps = false;

    public function driver()
    {
        return $this->belongsTo(Employee::class,'driver_id');
    }
    public function department()
    {
        return $this->belongsTo(Department::class);
    }
    public function subscription()
    {
        return $this->belongsTo(Subscription::class);
    }

}
