<?php

namespace App\Modules\Kanban\Kanban\Controllers;

use App\Http\Controllers\Controller;
use App\Modules\Kanban\Kanban\Models\Board;
use App\Modules\Kanban\Kanban\Models\Column;
use App\Modules\Kanban\Kanban\Requests\ColumnStoreRequest;
use App\Modules\Kanban\Kanban\Requests\ColumnUpdateRequest;
use App\Modules\Kanban\Kanban\Services\ColumnService;

class ColumnController extends Controller
{
    public function create(Board $board)
    {
        return view('modules_kanban_kanban::columns.create', compact('board'));
    }
    public function store(ColumnStoreRequest $request, ColumnService $service, Board $board)
    {
        $column = $service->store($request, $board);
        return redirect()->route('kanban.kanban.boards.show', compact('board'));
    }
    public function show(Column $column)
    {
        return view('modules_kanban_kanban::columns.show', compact('column'));
    }
    public function edit(Column $column)
    {
        return view('modules_kanban_kanban::columns.edit', compact('column'));
    }
    public function update(ColumnUpdateRequest $request, ColumnService $service, Column $column)
    {
        $service->update($request, $column);
        $board = $column->board;
        return redirect()->route('kanban.kanban.boards.show', compact('board'));
    }
    public function delete(Column $column)
    {
        return view('modules_kanban_kanban::columns.delete', compact('column'));
    }
    public function destroy(Column $column)
    {
        $column->delete();
        $board = $column->board;
        return redirect()->route('kanban.kanban.boards.show', compact('board'));
    }
}
