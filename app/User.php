<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','address',
    ];

    public function comment()
    {
        return $this->hasMany('App\Comment', 'id_user', 'id');
    }

    public function roles()
    {
        return $this->belongsToMany(Role::class,'role_users');
    }
//    hasAccess kiểm tra xem nguwoif dùng có quyền thực hiện hành động đó không
    public function hasAccess(array $permissions): bool
    {
        foreach ($this->roles as $role){
        if ($role->hasAccess($permissions)) {
            return true;
        }
    }
        return false;

    }
//inRole:kiểm tra xem nguwoif dùng có thuộc về một chức danh nào không
    public function inRole(string $roleSlug)
    {
        return $this->roles()->where('slug', $roleSlug)->count() == 1;
    }
    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
}
