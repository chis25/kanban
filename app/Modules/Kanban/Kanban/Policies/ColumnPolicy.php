<?php

namespace App\Modules\Kanban\Kanban\Policies;

use App\Modules\Kanban\Kanban\Models\Column;
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
    public function edit(User $user, Column $column)
    {
        return $user->hasPermission('module_kanban_kanban_boards_edit') && $column->board->owner()->id === $user->id;
    }
    public function delete(User $user, Column $column)
    {
        return $user->hasPermission('module_kanban_kanban_boards_edit') && $column->board->owner()->id === $user->id;
    }
}
