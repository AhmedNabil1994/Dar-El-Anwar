<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;
    protected $guarded =[];
    protected $table = 'financial_accounts';
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
        return $this->belongsTo(Admin::class ,'user_id');
    }
}
