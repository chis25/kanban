<?php

namespace App\Modules\System\Main\Policies;

use App\Modules\System\Main\Models\User;

class UserPolicy
{
    public function index(User $user)
    {
        return $user->hasPermission('module_system_main_users_index');
    }
    public function create(User $user)
    {
        return $user->hasPermission('module_system_main_users_create');
    }
    public function show(User $user, User $target)
    {
        return $user->hasPermission('module_system_main_users_show');
    }
    public function edit(User $user, User $target)
    {
        if ( $target->hasRole('admin') ) {
            return abort(403, 'Запрещено');
        }
        return $user->hasPermission('module_system_main_users_edit');
    }
    public function delete(User $user, User $target)
    {
        if ( $target->hasRole('admin') ) {
            return abort(403, 'Запрещено');
        }
        return $user->hasPermission('module_system_main_users_delete');
    }
}
