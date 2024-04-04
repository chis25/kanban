<?php
use Illuminate\Support\Facades\Route;
use App\Modules\System\Main\Controllers\RoleController;
use App\Modules\System\Main\Models\Role;
Route::prefix('admin/roles')->name('system.main.roles.')->controller(RoleController::class)->group(function () {
    Route::get('', 'index')->name('index')->can('index', Role::class);
    Route::get('create', 'create')->name('create')->can('create', Role::class);
    Route::post('store', 'store')->name('store')->can('create', Role::class);
    Route::prefix('id{role}')->group(function(){
        Route::get('', 'show')->name('show')->whereNumber('role')->can('show', 'role');
        Route::get('edit', 'edit')->name('edit')->whereNumber('role')->can('edit', 'role');
        Route::patch('update', 'update')->name('update')->whereNumber('role')->can('edit', 'role');
        Route::get('delete', 'delete')->name('delete')->whereNumber('role')->can('delete', 'role');
        Route::delete('destroy', 'destroy')->name('destroy')->whereNumber('role')->can('delete', 'role');
        Route::get('permissions', 'permissions_edit')->name('permissions.edit')->whereNumber('role')->can('edit', 'role');
        Route::patch('permissions', 'permissions_update')->name('permissions.update')->whereNumber('role')->can('edit', 'role');
    });
});