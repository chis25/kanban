<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('module_system_main_permissions', function (Blueprint $table) {
            $table->id();
            $table->string('name', 50);
            $table->string('title', 100);
            $table->foreignId('group_id')->constrained('module_system_main_permissions_groups')->cascadeOnDelete();
        });
    }
    public function down()
    {
        Schema::dropIfExists('module_system_main_permissions');
    }
};
