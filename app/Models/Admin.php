<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Traits\HasRoles;
use Spatie\Permission\Traits\HasPermissions;






//class Admin extends Model , Authenticatable
class Admin extends  Authenticatable
{
    use HasFactory, Notifiable, HasRoles, HasPermissions;


    protected $table = 'admins';
    protected $guarded = [];



    protected $hidden = [
        'password',
    ];

    protected $guard = 'admins';

    public function rol()
    {
        return $this->belongsToMany(Role::class);
    }
    public function my_settings()
    {
        return $this->hasMany(AdminSetting::class,'user_id');
    }

}
