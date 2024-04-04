<?php

namespace App\Modules\Kanban\Kanban\Policies;

use App\Modules\Kanban\Kanban\Models\Board;
use App\Modules\System\Main\Models\User;
use App\Modules\Kanban\Kanban\Models\Card;

class CardPolicy
{
    public function index(User $user)
    {
        return $user->hasPermission('module_kanban_kanban_cards_index');
    }
    public function create(User $user, Board $board)
    {
        return $user->hasPermission('module_kanban_kanban_boards_edit');
    }
    public function show(User $user, Card $card)
    {
        return $user->hasPermission('module_kanban_kanban_boards_show');
    }
    public function edit(User $user, Card $card)
    {
        return $user->hasPermission('module_kanban_kanban_boards_edit');
    }
    public function delete(User $user, Card $card)
    {
        return $user->hasPermission('module_kanban_kanban_boards_edit');
    }
}
