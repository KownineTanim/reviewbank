<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function active_users()
    {
        return $this->hasMany(User::class, 'active_role_id', 'id');
    }

    public function users()
    {
        return $this->hasMany(UserHasRole::class, 'role_id', 'id');
    }

    public function permissionids()
    {
        return $this->hasMany(RoleHasPermission::class, 'role_id', 'id')
            ->pluck('permission_id')
            ->toArray();
    }
}
