<?php
namespace App\Modules\Kanban\Kanban\Services;
use Illuminate\Http\Request;
use App\Modules\Kanban\Kanban\Models\Column;
class ColumnService
{
    public function store(Request $request): Column
    {
        return Column::create($request->validated());
    }
    public function update(Request $request, Column $column): bool
    {
        return $column->update($request->validated());
    }
}