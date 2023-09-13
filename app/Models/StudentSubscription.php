<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class StudentSubscription extends Model
{

    use HasFactory;
    protected $guarded = [];
    protected $table = 'student_subscription';

    public function subscription(): BelongsTo
    {
        return $this->belongsTo(Subscription::class);
    }

    public function student(): BelongsTo
    {
        return $this->belongsTo(Student::class);
    }
}
