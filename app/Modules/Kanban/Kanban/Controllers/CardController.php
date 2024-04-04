<?php

namespace App\Modules\Kanban\Kanban\Controllers;

use App\Http\Controllers\Controller;
use App\Modules\Kanban\Kanban\Models\Board;
use App\Modules\Kanban\Kanban\Models\Card;
use App\Modules\Kanban\Kanban\Models\Column;
use App\Modules\Kanban\Kanban\Requests\CardStoreRequest;
use App\Modules\Kanban\Kanban\Requests\CardUpdateRequest;
use App\Modules\Kanban\Kanban\Services\CardService;
use Illuminate\Http\Request;

class CardController extends Controller
{
    public function index()
    {
        $cards = auth()->user()->cards;
        return view('modules_kanban_kanban::cards.index', compact('cards'));
    }
    public function create(Board $board, Column $column)
    {
        $columns = $board->columns;
        return view('modules_kanban_kanban::cards.create', compact('board', 'column', 'columns'));
    }
    public function store(CardStoreRequest $request, CardService $service, Board $board, Column $column)
    {
        $card = $service->store($request);
        return redirect()->route('kanban.kanban.boards.show', compact('board'));
    }
    public function show(Card $card)
    {
        return view('modules_kanban_kanban::cards.show', compact('card'));
    }
    public function edit(Card $card)
    {
        $board = $card->column->board;
        $column = $card->column;
        $columns = $board->columns;
        return view('modules_kanban_kanban::cards.edit', compact('board', 'card', 'column', 'columns'));
    }
    public function update(CardUpdateRequest $request, CardService $service, Card $card)
    {
        $service->update($request, $card);
        return redirect()->route('kanban.kanban.cards.show', compact('card'));
    }
    public function delete(Card $card)
    {
        return view('modules_kanban_kanban::cards.delete', compact('card'));
    }
    public function destroy(Card $card)
    {
        $card->delete();
        return redirect()->route('kanban.kanban.cards.index');
    }
    public function users_edit(Card $card)
    {
        $users = $card->column->board->users;
        return view('modules_kanban_kanban::cards.users', compact('card', 'users'));
    }
    public function users_update(Request $request, Card $card)
    {
        $card->users()->sync($request->get('users'));
        return redirect()->route('kanban.kanban.cards.show', compact('card'));
    }
}
