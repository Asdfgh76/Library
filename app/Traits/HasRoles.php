<?php

namespace App\Traits;

use App\Models\Role;

trait HasRoles
{
    /**
     * @return mixed
     */
    public function roles()
    {
        return $this->belongsToMany(Role::class,'users_roles');
    }

    /**
     * @param mixed $role
     * @return bool
     */
    public function hasRole($role)
    {
        if ($this->roles->contains('slug', $role)) {
            return true;
        }
        return false;
    }

}
