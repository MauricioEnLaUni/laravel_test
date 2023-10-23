<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('tasks', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger("user_id");
            $table->string("name");
            $table->string("description");
            $table->timestamp("starting");
            $table->timestamp("ending");
            $table->timestamp("completed_at");
            $table->boolean("complete");
            $table->unsignedBigInteger("next_task_id")->nullable();
            $table->unsignedBigInteger("parent_task_id")->nullable();
            $table->unsignedBigInteger("board_id");
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('tasks');
    }
};
