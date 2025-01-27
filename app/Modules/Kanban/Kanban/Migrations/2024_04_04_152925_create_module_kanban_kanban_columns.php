<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
return new class extends Migration
{
    public function up()
    {
        Schema::create('module_kanban_kanban_columns', function (Blueprint $table) {
            $table->id();
            $table->string('title', 100);
            $table->string('color');
            $table->foreignId('board_id')->constrained('module_kanban_kanban_boards')->cascadeOnDelete();
            $table->timestamps();
        });
    }
    public function down()
    {
        Schema::dropIfExists('module_kanban_kanban_columns');
    }
};