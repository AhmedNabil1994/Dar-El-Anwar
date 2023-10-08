<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;

class ChatThread extends Model
{

    protected $guarded = [];

    public function chats()
    {
        return $this->hasMany(Chat::class);
    }

    public function instructor()
    {
        return $this->belongsTo(Employee::class, 'user_id');
    }

    public function student()
    {
        return $this->belongsTo(Student::class, 'sender_id');
    }
}
