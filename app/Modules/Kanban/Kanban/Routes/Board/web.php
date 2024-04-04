<?php
use Illuminate\Support\Facades\Route;
use App\Modules\Kanban\Kanban\Controllers\BoardController;
use App\Modules\Kanban\Kanban\Models\Board;
Route::prefix('kanban/boards')->name('kanban.kanban.boards.')->controller(BoardController::class)->group(function () {
    Route::get('', 'index')->name('index')->can('index', Board::class);
    Route::get('create', 'create')->name('create')->can('create', Board::class);
    Route::post('store', 'store')->name('store')->can('create', Board::class);
    Route::prefix('id{board}')->group(function(){
        Route::get('', 'show')->name('show')->whereNumber('board')->can('show', 'board');
        Route::get('edit', 'edit')->name('edit')->whereNumber('board')->can('edit', 'board');
        Route::patch('update', 'update')->name('update')->whereNumber('board')->can('edit', 'board');
        Route::get('delete', 'delete')->name('delete')->whereNumber('board')->can('delete', 'board');
        Route::delete('destroy', 'destroy')->name('destroy')->whereNumber('board')->can('delete', 'board');
    });
});