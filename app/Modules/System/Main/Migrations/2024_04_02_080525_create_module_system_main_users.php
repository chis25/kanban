<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('module_system_main_users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
            $table->timestamps();
        });
        $group = App\Modules\System\Main\Models\PermissionGroup::create([
            'title' => 'Пользователи',
        ]);
        App\Modules\System\Main\Models\Permission::create([
            'name' => 'module_system_main_users_index',
            'title' => 'Список',
            'group_id' => $group->id,
        ]);
        App\Modules\System\Main\Models\Permission::create([
            'name' => 'module_system_main_users_create',
            'title' => 'Создание',
            'group_id' => $group->id,
        ]);
        App\Modules\System\Main\Models\Permission::create([
            'name' => 'module_system_main_users_show',
            'title' => 'Просмотр',
            'group_id' => $group->id,
        ]);
        App\Modules\System\Main\Models\Permission::create([
            'name' => 'module_system_main_users_edit',
            'title' => 'Редактирование',
            'group_id' => $group->id,
        ]);
        App\Modules\System\Main\Models\Permission::create([
            'name' => 'module_system_main_users_delete',
            'title' => 'Удаление',
            'group_id' => $group->id,
        ]);
    }
    public function down()
    {
        Schema::dropIfExists('module_system_main_users');
    }
};
