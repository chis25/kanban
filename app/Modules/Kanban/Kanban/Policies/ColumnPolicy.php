<?php

namespace App\Modules\Kanban\Kanban\Policies;

use App\Modules\System\Main\Models\User;

class ColumnPolicy
{
    public function create(User $user)
    {
        return $user->hasPermission('module_kanban_kanban_boards_edit');
    }
    public function show(User $user)
    {
        return $user->hasPermission('module_kanban_kanban_boards_show');
    }
    public function edit(User $user)
    {
        return $user->hasPermission('module_kanban_kanban_boards_edit');
    }
    public function delete(User $user)
    {
        return $user->hasPermission('module_kanban_kanban_boards_edit');
    }
}
