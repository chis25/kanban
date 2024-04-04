<?php

use Illuminate\Support\Facades\Route;

Route::get('', function () {
    return view('modules_system_main::main.index');
})->name('main');
