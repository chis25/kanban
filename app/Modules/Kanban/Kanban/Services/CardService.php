<?php
namespace App\Modules\Kanban\Kanban\Services;
use Illuminate\Http\Request;
use App\Modules\Kanban\Kanban\Models\Card;
class CardService
{
    public function store(Request $request): Card
    {
        return Card::create($request->validated());
    }
    public function update(Request $request, Card $card): bool
    {
        return $card->update($request->validated());
    }
}