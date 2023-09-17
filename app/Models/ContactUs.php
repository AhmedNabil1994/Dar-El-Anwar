<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ContactUs extends Model
{
    use HasFactory;

    protected $guarded =[];

    public function contactUsIssue()
    {
        return $this->belongsTo(ContactUsIssue::class);
    }

    public function sender_user()
    {
        return $this->belongsTo(User::class,'sender_id');
    }

    public function sender_student()
    {
        return $this->belongsTo(Student::class,'sender_id')->where('sender_type',2);
    }

    public function sender_parent()
    {
        return $this->belongsTo(ParentInfo::class,'sender_id')->where('sender_type',3);
    }

    public function sender_instructor()
    {
        return $this->belongsTo(Instructor::class,'sender_id')->where('sender_type',4);
    }

    public function receiver_user()
    {
        return $this->belongsTo(User::class,'receiver_id')->where('receiver_type',1);
    }

    public function receiver_student()
    {
        return $this->belongsTo(Student::class,'receiver_id')->where('receiver_type',2);
    }

    public function receiver_parent()
    {
        return $this->belongsTo(ParentInfo::class,'receiver_id')->where('receiver_type',3);
    }

    public function receiver_instructor()
    {
        return $this->belongsTo(Instructor::class,'receiver_id')->where('receiver_type',4);
    }

}
