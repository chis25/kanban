<?php
namespace App\Modules\Kanban\Kanban\Policies;
use App\Modules\System\Main\Models\User;
use App\Modules\Kanban\Kanban\Models\Board;
class BoardPolicy
{
    public function index(User $user)
    {
        return $user->hasPermission('module_kanban_kanban_boards_index');
    }
    public function create(User $user)
    {
        return $user->hasPermission('module_kanban_kanban_boards_create');
    }
    public function show(User $user, Board $board)
    {
        return $user->hasPermission('module_kanban_kanban_boards_show');
    }
    public function edit(User $user, Board $board)
    {
        return $user->hasPermission('module_kanban_kanban_boards_edit');
    }
    public function delete(User $user, Board $board)
    {
        return $user->hasPermission('module_kanban_kanban_boards_delete');
    }
}