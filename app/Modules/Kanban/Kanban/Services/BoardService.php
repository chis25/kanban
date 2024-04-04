<?php
namespace App\Modules\Kanban\Kanban\Services;
use Illuminate\Http\Request;
use App\Modules\Kanban\Kanban\Models\Board;
class BoardService
{
    public function store(Request $request): Board
    {
        $board = Board::create($request->validated());
        $board->users()->attach(auth()->user()->id, ['is_owner' => true]);
        return $board;
    }
    public function update(Request $request, Board $board): bool
    {
        return $board->update($request->validated());
    }
}