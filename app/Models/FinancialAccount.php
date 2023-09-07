<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FinancialAccount extends Model
{
    use HasFactory;
    protected $guarded =[];

    public function student()
    {
        return $this->belongsTo(Student::class,'student_id');
    }

    public function branch()
    {
        return $this->belongsTo(Branch::class,'branch_ic');
    }

    public function user()
    {
        return $this->belongsTo(User::class ,'user_id');
    }
}
