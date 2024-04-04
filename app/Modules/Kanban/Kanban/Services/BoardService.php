<?php
namespace App\Modules\Kanban\Kanban\Services;
use Illuminate\Http\Request;
use App\Modules\Kanban\Kanban\Models\Board;
class BoardService
{
    public function store(Request $request): Board
    {
        return Board::create($request->validated());
    }
    public function update(Request $request, Board $board): bool
    {
        return $board->update($request->validated());
    }
}