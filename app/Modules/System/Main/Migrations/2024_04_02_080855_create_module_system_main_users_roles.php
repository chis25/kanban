<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('module_system_main_users_roles', function (Blueprint $table) {
            $table->foreignId('user_id')->constrained('module_system_main_users')->cascadeOnDelete();
            $table->foreignId('role_id')->constrained('module_system_main_roles')->cascadeOnDelete();
            $table->primary(['user_id', 'role_id']);
        });
    }
    public function down()
    {
        Schema::dropIfExists('module_system_main_users_roles');
    }
};
