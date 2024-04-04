<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('module_system_main_roles_permissions', function (Blueprint $table) {
            $table->foreignId('role_id')->constrained('module_system_main_roles')->cascadeOnDelete();
            $table->foreignId('permission_id')->constrained('module_system_main_permissions')->cascadeOnDelete();
            $table->primary(['role_id', 'permission_id']);
        });
    }
    public function down()
    {
        Schema::dropIfExists('module_system_main_roles_permissions');
    }
};
