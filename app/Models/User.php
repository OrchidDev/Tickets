<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'username',
        'is_admin',
        'is_staff',
        'sms',
        'email_conn',
        'mobile_conn',
        'group_id',
        'mobile',
        'gender',
        'role_id',
        'pic1',
        'pic2',
        'position',
        'task_start',
        'task_review',
        'task_comp',
        'manage_start',
        'manage_review',
        'manage_comp',
        'manage_end',
        'manage_cancel'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function isAdmin()
    {
        return $this->is_admin;
    }

    public function isStaff()
    {
        return $this->is_staff;
    }

    public function permissions()
    {
        return $this->belongsToMany(Permission::class);
    }

    public function roles()
    {
        return $this->belongsToMany(Role::class);
    }

    public function hasPermission($permission)
    {
        return $this->permissions->contains('value',$permission->value) || $this->hasRole($permission->role);
    }

    public function hasRole($roles)
    {
        return !! $roles->intersect($this->roles)->all();
    }
}
