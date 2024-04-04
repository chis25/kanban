<?php
namespace App\Modules\Kanban\Kanban\Controllers;
use App\Http\Controllers\Controller;
use App\Modules\Kanban\Kanban\Models\Board;
use App\Modules\Kanban\Kanban\Requests\BoardStoreRequest;
use App\Modules\Kanban\Kanban\Requests\BoardUpdateRequest;
use App\Modules\Kanban\Kanban\Services\BoardService;
use App\Modules\System\Main\Models\User;
use Illuminate\Http\Request;

class BoardController extends Controller
{
    public function index()
    {
        if ( auth()->user()->hasRole('admin') ) {
            $boards = Board::all();
        } else {
            $boards = auth()->user()->boards;
        }
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
    public function users_edit(Board $board)
    {
        $users = User::all();
        return view('modules_kanban_kanban::boards.users', compact('board', 'users'));
    }
    public function users_update(Request $request, Board $board)
    {
        $board->users()->sync($request->get('users'));
        return redirect()->route('kanban.kanban.boards.show', compact('board'));
    }
} 