<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    protected $fillable = ['name', 'slug', 'permissions',];
    protected $table = 'roles';

    public function users()
    {
        return $this->belongsToMany(User::class, 'role_users');
    }

    public function hasAccess(array $permissions):bool
    {
        foreach ($permissions as $permission) {
            return true;
        }
        return false;
    }

    private function hasPermission(string $permission): bool
    {
        return $this->permission[$permission] ?? false;
    }
}
