<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Str;

class Certificate extends Model
{
    use HasFactory;

    protected $table = 'certificates';
    protected $primaryKey = 'id';

    protected $fillable = [
        'show_number',
        'number_x_position',
        'number_y_position',
        'number_font_size',
        'number_font_color',
        'title',
        'title_x_position',
        'title_y_position',
        'title_font_size',
        'title_font_color',
        'show_date',
        'date_x_position',
        'date_y_position',
        'date_font_size',
        'date_font_color',
        'show_student_name',
        'student_id',
        'student_name_x_position',
        'student_name_y_position',
        'student_name_font_size',
        'student_name_font_color',
        'department_id',
        'department_x_position',
        'department_y_position',
        'department_font_size',
        'department_font_color',
        'body',
        'body_max_length',
        'body_x_position',
        'body_y_position',
        'body_font_size',
        'body_font_color',
        'role_1_title',
        'role_1_x_position',
        'role_1_y_position',
        'role_1_font_size',
        'role_1_font_color',
        'role_2_title',
        'role_2_x_position',
        'role_2_y_position',
        'role_2_font_size',
        'role_2_font_color',
        'receiving_type',
        'receiving_way',
    ];

    protected static function boot()
    {
        parent::boot();
        self::creating(function($model){
            $model->uuid =  Str::uuid()->toString();
        });
    }

    public function student() : BelongsTo
    {
        return $this->belongsTo(Student::class);
    }

    public function department() : BelongsTo
    {
        return $this->belongsTo(Department::class);
    }

    public function instructor() : BelongsTo
    {
        return $this->belongsTo(Instructor::class);
    }
}
