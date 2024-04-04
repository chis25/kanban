<?php
use Illuminate\Support\Facades\Route;
use App\Modules\System\Main\Controllers\UserController;
use App\Modules\System\Main\Models\User;
Route::prefix('admin/users')->name('system.main.users.')->controller(UserController::class)->group(function () {
    Route::get('', 'index')->name('index')->can('index', User::class);
    Route::get('create', 'create')->name('create')->can('create', User::class);
    Route::post('store', 'store')->name('store')->can('create', User::class);
    Route::prefix('id{user}')->group(function(){
        Route::get('', 'show')->name('show')->whereNumber('user')->can('show', 'user');
        Route::get('edit', 'edit')->name('edit')->whereNumber('user')->can('edit', 'user');
        Route::patch('update', 'update')->name('update')->whereNumber('user')->can('edit', 'user');
        Route::get('delete', 'delete')->name('delete')->whereNumber('user')->can('delete', 'user');
        Route::delete('destroy', 'destroy')->name('destroy')->whereNumber('user')->can('delete', 'user');
        Route::get('roles', 'roles_edit')->name('roles.edit')->whereNumber('user')->can('edit', 'user');
        Route::patch('roles', 'roles_update')->name('roles.update')->whereNumber('user')->can('edit', 'user');
        Route::get('password', 'password_edit')->name('password.edit')->whereNumber('user')->can('edit', 'user');
        Route::patch('password', 'password_update')->name('password.update')->whereNumber('user')->can('edit', 'user');
    });
});