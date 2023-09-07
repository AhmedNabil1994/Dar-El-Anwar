<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Followup extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function instructor()
    {
        return $this->belongsTo(Instructor::class,'instructor_id');
    }

    public function subject()
    {
        return $this->belongsTo(Subject::class);
    }

    public function classroom()
    {
        return $this->belongsTo(ClassRoom::class,'class_id');
    }

    public function getStatus()
    {
        if($this->status == 1)
        {
            return 'active';
        }
        else
        {
            return 'inactive';
        }
    }

    public function followup_responses()
    {
        return $this->hasMany(FollowupResponses::class, 'folowup_id');
    }

}
