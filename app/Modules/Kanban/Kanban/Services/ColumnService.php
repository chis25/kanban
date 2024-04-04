<?php

namespace App\Modules\Kanban\Kanban\Services;

use App\Modules\Kanban\Kanban\Models\Board;
use Illuminate\Http\Request;
use App\Modules\Kanban\Kanban\Models\Column;

class ColumnService
{
    public function store(Request $request, Board $board): Column
    {
        return Column::create($request->validated() + ['board_id' => $board->id]);
    }
    public function update(Request $request, Column $column): bool
    {
        return $column->update($request->validated());
    }
}
