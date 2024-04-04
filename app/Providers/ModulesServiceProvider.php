<?php

namespace App\Providers;

use Illuminate\Filesystem\Filesystem;
use Illuminate\Support\Arr;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\ServiceProvider;

/*
 *
 * 1. Скопировать файл в папку app\Providers
 * 
 * 2. Добавить в файл config/app.php в секцию providers запись:
 *    App\Providers\ModulesServiceProvider::class
 * 
 */

class ModulesServiceProvider extends ServiceProvider
{
    protected Filesystem $files;
    public function boot(Filesystem $files)
    {
        $this->files = $files;
        // Поиск и регистрация модулей
        foreach ($this->files->glob(app_path('Modules/*/*', GLOB_ONLYDIR)) as $path) {
            // Конфиги
            if ($this->files->isDirectory($path . '/Configs')) {
                foreach ($this->files->allFiles($path . '/Configs') as $file) {
                    $this->mergeConfigFrom($file, modules_create_path($path) . '_' . Str::snake(basename($file, '.php'), '-'));
                }
            }
            // Миграции
            if ($this->files->isDirectory($path . '/Migrations')) {
                $this->loadMigrationsFrom($path . '/Migrations');
            }
            // Маршруты
            if ($this->files->isDirectory($path . '/Routes')) {
                foreach ($this->files->allFiles($path . '/Routes') as $file) {
                    Route::middleware(basename($file, '.php'))->group($file);
                }
            }
            // Виды
            if ($this->files->isDirectory($path . '/Views')) {
                $this->loadViewsFrom($path . '/Views', modules_create_path($path));
            }
        }
    }
}

function modules_create_path($path)
{
    $parts = array_slice(explode(DIRECTORY_SEPARATOR, str_replace(['/', '\\'], DIRECTORY_SEPARATOR, $path)), -3);
    return Str::snake($parts[0], '-') . '_' . Str::snake($parts[1], '-') . '_' . strtolower($parts[2]);
}
