<?php
namespace App\Modules\Kanban\Kanban\Controllers;
use App\Http\Controllers\Controller;
use App\Modules\Kanban\Kanban\Models\Card;
use App\Modules\Kanban\Kanban\Requests\CardStoreRequest;
use App\Modules\Kanban\Kanban\Requests\CardUpdateRequest;
use App\Modules\Kanban\Kanban\Services\CardService;
class CardController extends Controller
{
    public function index()
    {
        $cards = Card::all();
        return view('modules_kanban_kanban::cards.index', compact('cards'));
    }
    public function create()
    {
        return view('modules_kanban_kanban::cards.create');
    }
    public function store(CardStoreRequest $request, CardService $service)
    {
        $card = $service->store($request);
        return redirect()->route('kanban.kanban.cards.show', compact('card'));
    }
    public function show(Card $card)
    {
        return view('modules_kanban_kanban::cards.show', compact('card'));
    }
    public function edit(Card $card)
    {
        return view('modules_kanban_kanban::cards.edit', compact('card'));
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
} 