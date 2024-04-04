<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
return new class extends Migration
{
    public function up()
    {
        Schema::create('module_kanban_kanban_boards', function (Blueprint $table) {
            $table->id();
            $table->string('title', 100);
            $table->timestamps();
        });
        $group = App\Modules\System\Main\Models\PermissionGroup::create([
            'title' => 'Доски',
        ]);
        $ids = [];
        $ids[] = App\Modules\System\Main\Models\Permission::create([
            'name' => 'module_kanban_kanban_boards_index',
            'title' => 'Просмотр списка досок',
            'group_id' => $group->id,
        ])->id;
        $ids[] = App\Modules\System\Main\Models\Permission::create([
            'name' => 'module_kanban_kanban_boards_create',
            'title' => 'Создание досок',
            'group_id' => $group->id,
        ])->id;
        $ids[] = App\Modules\System\Main\Models\Permission::create([
            'name' => 'module_kanban_kanban_boards_show',
            'title' => 'Просмотр досок',
            'group_id' => $group->id,
        ])->id;
        $ids[] = App\Modules\System\Main\Models\Permission::create([
            'name' => 'module_kanban_kanban_boards_edit',
            'title' => 'Редактирование досок',
            'group_id' => $group->id,
        ])->id;
        $ids[] = App\Modules\System\Main\Models\Permission::create([
            'name' => 'module_kanban_kanban_boards_delete',
            'title' => 'Удаление досок',
            'group_id' => $group->id,
        ])->id;
        $role = \App\Modules\System\Main\Models\Role::create([
            'name' => 'kanban',
            'title' => 'Канбан',
        ]);
        $role->permissions()->sync($ids);
    }
    public function down()
    {
        Schema::dropIfExists('module_kanban_kanban_boards');
    }
};