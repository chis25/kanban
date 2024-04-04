<?php
namespace App\Modules\Kanban\Kanban\Controllers;
use App\Http\Controllers\Controller;
use App\Modules\Kanban\Kanban\Models\Board;
use App\Modules\Kanban\Kanban\Requests\BoardStoreRequest;
use App\Modules\Kanban\Kanban\Requests\BoardUpdateRequest;
use App\Modules\Kanban\Kanban\Services\BoardService;
class BoardController extends Controller
{
    public function index()
    {
        $boards = Board::all();
        return view('modules_kanban_kanban::boards.index', compact('boards'));
    }
    public function create()
    {
        return view('modules_kanban_kanban::boards.create');
    }
    public function store(BoardStoreRequest $request, BoardService $service)
    {
        $board = $service->store($request);
        return redirect()->route('kanban.kanban.boards.show', compact('board'));
    }
    public function show(Board $board)
    {
        return view('modules_kanban_kanban::boards.show', compact('board'));
    }
    public function edit(Board $board)
    {
        return view('modules_kanban_kanban::boards.edit', compact('board'));
    }
    public function update(BoardUpdateRequest $request, BoardService $service, Board $board)
    {
        $service->update($request, $board);
        return redirect()->route('kanban.kanban.boards.show', compact('board'));
    }
    public function delete(Board $board)
    {
        return view('modules_kanban_kanban::boards.delete', compact('board'));
    }
    public function destroy(Board $board)
    {
        $board->delete();
        return redirect()->route('kanban.kanban.boards.index');
    }
} 