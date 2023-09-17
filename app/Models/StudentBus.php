<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StudentBus extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function student()
    {
        return $this->belongsTo(Student::class);
    }

    public function bus()
    {
        return $this->belongsTo(Bus::class);
    }
}
