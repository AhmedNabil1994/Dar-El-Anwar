<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FollowupResponses extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function questions()
    {
        return $this->belongsTo(FollowupQuestions::class, 'question_id');

    }

    public function followup()
    {
        return $this->belongsTo(Followup::class, 'folowup_id');

    }

}
