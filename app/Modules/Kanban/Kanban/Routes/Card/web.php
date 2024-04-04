<?php
use Illuminate\Support\Facades\Route;
use App\Modules\Kanban\Kanban\Controllers\CardController;
use App\Modules\Kanban\Kanban\Models\Card;
Route::prefix('kanban/cards')->name('kanban.kanban.cards.')->controller(CardController::class)->group(function () {
    Route::get('', 'index')->name('index')->can('index', Card::class);
    Route::get('create', 'create')->name('create')->can('create', Card::class);
    Route::post('store', 'store')->name('store')->can('create', Card::class);
    Route::prefix('id{card}')->group(function(){
        Route::get('', 'show')->name('show')->whereNumber('card')->can('show', 'card');
        Route::get('edit', 'edit')->name('edit')->whereNumber('card')->can('edit', 'card');
        Route::patch('update', 'update')->name('update')->whereNumber('card')->can('edit', 'card');
        Route::get('delete', 'delete')->name('delete')->whereNumber('card')->can('delete', 'card');
        Route::delete('destroy', 'destroy')->name('destroy')->whereNumber('card')->can('delete', 'card');
    });
});