<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
return new class extends Migration
{
    public function up()
    {
        Schema::create('module_kanban_kanban_users_cards', function (Blueprint $table) {
            $table->foreignId('user_id')->constrained('module_system_main_users')->cascadeOnDelete();
            $table->foreignId('card_id')->constrained('module_kanban_kanban_cards')->cascadeOnDelete();
            $table->primary(['user_id', 'card_id']);
        });
    }
    public function down()
    {
        Schema::dropIfExists('module_kanban_kanban_users_cards');
    }
};