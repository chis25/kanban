<?php
namespace App\Modules\Kanban\Kanban\Controllers;
use App\Http\Controllers\Controller;
use App\Modules\Kanban\Kanban\Models\Column;
use App\Modules\Kanban\Kanban\Requests\ColumnStoreRequest;
use App\Modules\Kanban\Kanban\Requests\ColumnUpdateRequest;
use App\Modules\Kanban\Kanban\Services\ColumnService;
class ColumnController extends Controller
{
    public function index()
    {
        $columns = Column::all();
        return view('modules_kanban_kanban::columns.index', compact('columns'));
    }
    public function create()
    {
        return view('modules_kanban_kanban::columns.create');
    }
    public function store(ColumnStoreRequest $request, ColumnService $service)
    {
        $column = $service->store($request);
        return redirect()->route('kanban.kanban.columns.show', compact('column'));
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
        return redirect()->route('kanban.kanban.columns.show', compact('column'));
    }
    public function delete(Column $column)
    {
        return view('modules_kanban_kanban::columns.delete', compact('column'));
    }
    public function destroy(Column $column)
    {
        $column->delete();
        return redirect()->route('kanban.kanban.columns.index');
    }
} 