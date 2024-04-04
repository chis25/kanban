<?php

namespace App\Modules\System\Main\Policies;

use App\Modules\System\Main\Models\User;
use App\Modules\System\Main\Models\Role;

class RolePolicy
{
    public function index(User $user)
    {
        return $user->hasPermission('module_system_main_roles_index');
    }
    public function create(User $user)
    {
        return $user->hasPermission('module_system_main_roles_create');
    }
    public function show(User $user, Role $role)
    {
        return $user->hasPermission('module_system_main_roles_show');
    }
    public function edit(User $user, Role $role)
    {
        if ( $role->is_system ) {
            return abort(403, 'Запрещено');
        }
        return $user->hasPermission('module_system_main_roles_edit');
    }
    public function delete(User $user, Role $role)
    {
        if ( $role->is_system ) {
            return abort(403, 'Запрещено');
        }
        return $user->hasPermission('module_system_main_roles_delete');
    }
}
