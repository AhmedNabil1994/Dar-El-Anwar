<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Str;

class Product extends Model
{
    use HasFactory;

    protected $table = 'products';
    protected $primaryKey = 'id';
    protected $guarded = [];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function meda(): BelongsTo
    {
        return $this->belongsTo(Upload::class, 'image');
    }

    public function getImagePathAttribute()
    {
        return $this->media?->file_name;
    }

    public function transactions(): HasMany
    {
        return $this->hasMany(StoreTransaction::class);
    }

    /**
     * @return BelongsTo
     */
    public function department(): BelongsTo
    {
        return $this->belongsTo(Department::class,'department_id');
    }


}
