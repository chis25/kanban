<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('module_system_main_permissions_groups', function (Blueprint $table) {
            $table->id();
            $table->string('title', 100);
        });
    }
    public function down()
    {
        Schema::dropIfExists('module_system_main_permissions_groups');
    }
};
