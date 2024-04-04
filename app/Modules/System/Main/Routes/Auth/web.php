<?php

use Illuminate\Support\Facades\Route;

Route::get('login', function () {
    return view('modules_system_main::auth.login');
})->name('login');

Route::controller(App\Modules\System\Main\Controllers\AuthController::class)->group(function () {
    Route::post('login', 'login')->name('auth');
    Route::get('logout', 'logout')->name('logout');
});
