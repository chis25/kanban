<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
return new class extends Migration
{
    public function up()
    {
        Schema::create('module_kanban_kanban_cards', function (Blueprint $table) {
            $table->id();
            $table->string('title', 100);
            $table->foreignId('column_id')->constrained('module_kanban_kanban_columns')->cascadeOnDelete();
            $table->timestamps();
        });
    }
    public function down()
    {
        Schema::dropIfExists('module_kanban_kanban_cards');
    }
};