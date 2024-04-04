<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
return new class extends Migration
{
    public function up()
    {
        Schema::create('module_kanban_kanban_users_boards', function (Blueprint $table) {
            $table->foreignId('user_id')->constrained('module_system_main_users')->cascadeOnDelete();
            $table->foreignId('board_id')->constrained('module_kanban_kanban_boards')->cascadeOnDelete();
            $table->boolean('is_owner')->default(false);
            $table->primary(['user_id', 'board_id']);
        });
    }
    public function down()
    {
        Schema::dropIfExists('module_kanban_kanban_users_boards');
    }
};