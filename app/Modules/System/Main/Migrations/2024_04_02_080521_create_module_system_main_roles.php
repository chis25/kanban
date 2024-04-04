<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('module_system_main_roles', function (Blueprint $table) {
            $table->id();
            $table->string('name', 50);
            $table->string('title', 100);
            $table->boolean('is_system')->default(false);
        });
        $group = App\Modules\System\Main\Models\PermissionGroup::create([
            'title' => 'Роли',
        ]);
        App\Modules\System\Main\Models\Permission::create([
            'name' => 'module_system_main_roles_index',
            'title' => 'Список',
            'group_id' => $group->id,
        ]);
        App\Modules\System\Main\Models\Permission::create([
            'name' => 'module_system_main_roles_create',
            'title' => 'Создание',
            'group_id' => $group->id,
        ]);
        App\Modules\System\Main\Models\Permission::create([
            'name' => 'module_system_main_roles_show',
            'title' => 'Просмотр',
            'group_id' => $group->id,
        ]);
        App\Modules\System\Main\Models\Permission::create([
            'name' => 'module_system_main_roles_edit',
            'title' => 'Редактирование',
            'group_id' => $group->id,
        ]);
        App\Modules\System\Main\Models\Permission::create([
            'name' => 'module_system_main_roles_delete',
            'title' => 'Удаление',
            'group_id' => $group->id,
        ]);
    }
    public function down()
    {
        Schema::dropIfExists('module_system_main_roles');
    }
};
