<?php
namespace App\Modules\Kanban\Kanban\Policies;
use App\Modules\System\Main\Models\User;
use App\Modules\Kanban\Kanban\Models\Column;
class ColumnPolicy
{
    public function index(User $user)
    {
        return $user->hasPermission('module_kanban_kanban_columns_index');
    }
    public function create(User $user)
    {
        return $user->hasPermission('module_kanban_kanban_columns_create');
    }
    public function show(User $user, Column $column)
    {
        return $user->hasPermission('module_kanban_kanban_columns_show');
    }
    public function edit(User $user, Column $column)
    {
        return $user->hasPermission('module_kanban_kanban_columns_edit');
    }
    public function delete(User $user, Column $column)
    {
        return $user->hasPermission('module_kanban_kanban_columns_delete');
    }
}