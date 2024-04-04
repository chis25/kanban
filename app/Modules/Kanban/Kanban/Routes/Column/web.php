<?php
use Illuminate\Support\Facades\Route;
use App\Modules\Kanban\Kanban\Controllers\ColumnController;
use App\Modules\Kanban\Kanban\Models\Column;
Route::prefix('kanban/columns')->name('kanban.kanban.columns.')->controller(ColumnController::class)->group(function () {
    Route::get('', 'index')->name('index')->can('index', Column::class);
    Route::get('create', 'create')->name('create')->can('create', Column::class);
    Route::post('store', 'store')->name('store')->can('create', Column::class);
    Route::prefix('id{column}')->group(function(){
        Route::get('', 'show')->name('show')->whereNumber('column')->can('show', 'column');
        Route::get('edit', 'edit')->name('edit')->whereNumber('column')->can('edit', 'column');
        Route::patch('update', 'update')->name('update')->whereNumber('column')->can('edit', 'column');
        Route::get('delete', 'delete')->name('delete')->whereNumber('column')->can('delete', 'column');
        Route::delete('destroy', 'destroy')->name('destroy')->whereNumber('column')->can('delete', 'column');
    });
});